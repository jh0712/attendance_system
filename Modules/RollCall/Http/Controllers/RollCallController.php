<?php

namespace Modules\RollCall\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Course\Contracts\CourseDetailContract;
use Modules\Member\Contracts\MemberContract;
use Modules\Member\Entities\Member;
use Modules\RollCall\Contracts\RollCallContract;
use Modules\User\Entities\User;

class RollCallController extends Controller
{
    public function __construct(
        private readonly CourseDetailContract $courseDetailRepo,
        private MemberContract                $memberRepo,
        private RollCallContract              $rollCallRepo,

    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('course::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($course_id, $course_detail_id)
    {
        $courseDetail = $this->courseDetailRepo->find($course_detail_id, ['course.members']);
        $course = $courseDetail->course;
        $members = $course->members->pluck('member_id');
        $members = $this->memberRepo->find($members->toArray());

        return view('rollcall::action.create', compact('course_id', 'courseDetail', 'members', 'course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$course_id,$course_detail_id): RedirectResponse
    {
        $courseDetail = $this->courseDetailRepo->find($course_detail_id);
        if(!$courseDetail){
            return redirect()->route('course_detail.index', $course_id);
        }
        $arriveMemberIds = $request->input('arrive_member_ids') ?? [];
        $courseDetail = $this->courseDetailRepo->find($course_detail_id, ['course.members']);
        $course = $courseDetail->course;
        $members = $course->members->pluck('member_id')->sort()->toArray();
        $rollCallData = [];
        foreach ($members as $memberId){
            if(in_array($memberId, $arriveMemberIds)){
                $arriveStatus = 1;
            }else{
                $arriveStatus = 0;
            }
            $rollCallData []= [
                'course_id' => $course_id,
                'course_detail_id' => $course_detail_id,
                'member_id' => $memberId,
                'arrive_status' => $arriveStatus,
            ];
        }
        $this->rollCallRepo->insert($rollCallData);

        return redirect()->route('roll_call.edit', [$course_id, $course_detail_id]);
    }


    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('rollcall::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($course_id, $course_detail_id)
    {
        $courseDetail = $this->courseDetailRepo->find($course_detail_id, ['course.members']);
        $course = $courseDetail->course;
        $rollCalls = $this->rollCallRepo->getModel()
            ->where('course_id', $course_id)
            ->where('course_detail_id', $course_detail_id)
            ->with('member')
            ->get()->sort();
        return view('rollcall::action.edit', compact('course_id', 'courseDetail', 'rollCalls', 'course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $course_id ,$course_detail_id): RedirectResponse
    {
        $allRollCallIds = $this->rollCallRepo
            ->getModel()
            ->where('course_detail_id', $course_detail_id)
            ->pluck('id')
            ->toArray();
        $arriveIds = $request->input('roll_call_ids') ?? [];
        $absentIds = array_diff($allRollCallIds, $arriveIds);
        $this->rollCallRepo->getModel()
            ->where('course_detail_id', $course_detail_id)
            ->whereIn('id',$arriveIds)
            ->update(['arrive_status' => true]);
        $this->rollCallRepo->getModel()
            ->where('course_detail_id', $course_detail_id)
            ->whereIn('id',$absentIds)
            ->update(['arrive_status' => false]);
        return redirect()->route('roll_call.edit', [$course_id, $course_detail_id]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
