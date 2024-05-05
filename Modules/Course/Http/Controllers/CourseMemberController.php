<?php

namespace Modules\Course\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Course\Contracts\CourseContract;
use Modules\Course\Contracts\CourseMemberMappingContract;
use Modules\Member\Contracts\MemberContract;

class CourseMemberController extends Controller
{
    public function __construct(
        public CourseMemberMappingContract $courseMemberRepo,
        public CourseContract $courseRepo,
        public MemberContract $memberRepo
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index($course_id): View
    {
        $table['url'] = route("course_member_list", $course_id);
        $table['column'] = [
            ['data' => 'id', 'name' => 'id'],
            ['data' => 'name', 'name' => 'name'],
            ['data' => 'date_of_birth', 'name' => 'date_of_birth'],
            ['data' => 'type', 'name' => 'type'],
            ['data' => 'detail_btn', 'name' => 'detail_btn'],
        ];
        $table['header'] = ['序號', '學員名稱', '生日', '類別', '編輯'];
        return view('course::course_member.action.index', compact('table', 'course_id'));
    }

    public function list(Request $request, $course_id): JsonResponse
    {
        $courseMember = $this->courseMemberRepo->getmodel()
            ->where('course_id', $course_id)
            ->with('member')
            ->get();
        $courseMember->map(function ($item, $key) {
            $item->serial_number = $key + 1;
            return $item;
        });
        return datatables()->collection($courseMember)
            ->editColumn('id', function ($data) {
                return $data->serial_number;
            })
            ->editColumn('detail_btn', function ($data) {
                return "<a href='" . route('course_member.edit', [$data->course_id, $data->id]) . "' target='_blank' class='btn btn-sm btn-primary'>edit</a>";
            })
            ->addColumn('name',function ($data){
                return "<a href='" . route('member.edit', [$data->member->id]) . "' target='_blank' class='btn btn-sm btn-primary'>{$data->member->name}</a>";
            })
            ->addColumn('date_of_birth',function ($data){
                return $data->member->date_of_birth;
            })
            ->addColumn('type',function ($data){
                return $data->type;
            })
            ->rawColumns(['detail_btn','name'])
            ->make();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($course_id): View
    {
        $course = $this->courseRepo->getmodel()
            ->where('id', $course_id)
            ->with('members')
            ->first();
        // exist
        $members = $this->memberRepo->all()->sort();
        $already_assign = $course->members->pluck('member_id')->toArray();
        $members = $members->whereNotIn('id',$already_assign);
        return view('course::course_member.action.create', compact('course_id','members'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $course_id): RedirectResponse
    {

        // mapping function
        $memberIds = $request->input('members');
        $type = $request->input('type');
        $attr = [];
        foreach ($memberIds as $id){
            $attr[] = [
                'course_id' => $course_id,
                'member_id' => $id,
                'type' =>$type[$id]
            ];
        }

        $this->courseMemberRepo->insert($attr);
        return redirect()->route('course_member.index', [$course_id]);
    }

    /**
     * Show the specified resource.
     */
    public function show($course_id, $course_member_id): View
    {
        $courseMember = $this->courseMemberRepo->find($course_member_id);
        return view('course::course_member.action.edit', compact('courseMember'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($course_id, $course_member_id): View
    {
        $courseMember = $this->courseMemberRepo->find($course_member_id);
        return view('course::course_member.action.edit', compact('courseMember'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $course_id, $course_member_id): RedirectResponse
    {
        $courseMember = $this->courseMemberRepo->edit($course_member_id, $request->all());
        return redirect()->route('course_member.edit', [$course_id, $courseMember->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
