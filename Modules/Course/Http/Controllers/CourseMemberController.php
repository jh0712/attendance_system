<?php

namespace Modules\Course\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Course\Contracts\CourseContract;
use Modules\Course\Contracts\CourseMemberMappingContract;

class CourseMemberController extends Controller
{
    public function __construct(
        public CourseMemberMappingContract $courseMemberRepo,
        public CourseContract $courseRepo
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
        $course = $this->courseRepo->getmodel()
            ->where('id', $course_id)
            ->with('members')
            ->first();
        return datatables()->collection($course->members)
            ->editColumn('detail_btn', function ($data) {
                return "<a href='" . route('course_member.edit', [$data->course_id, $data->id]) . "' target='_blank' class='btn btn-sm btn-primary'>edit</a>";
            })
            ->addColumn('name',function ($member){
                return $member->name;
            })
            ->addColumn('date_of_birth',function ($member){
                return $member->date_of_birth;
            })
            ->addColumn('type',function ($member){
                return $member->type;
            })
            ->rawColumns(['detail_btn'])
            ->make();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($course_id): View
    {
        return view('course::course_detail.action.create', compact('course_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $course_id): RedirectResponse
    {
        // mapping function
        $attr = $request->all();
        $attr['course_id'] = $course_id;
        $courseDetail = $this->courseMemberRepo->add($attr);
        return redirect()->route('course_detail.edit', [$course_id, $courseDetail->id]);
    }

    /**
     * Show the specified resource.
     */
    public function show($course_id, $detail_id): View
    {
        $courseDetail = $this->courseMemberRepo->find($detail_id);
        return view('course::course_detail.action.edit', compact('courseDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($course_id, $detail_id): View
    {
        $courseDetail = $this->courseMemberRepo->find($detail_id);
        return view('course::course_detail.action.edit', compact('courseDetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $course_id, $detail_id): RedirectResponse
    {
        $courseDetail = $this->courseMemberRepo->edit($detail_id, $request->all());
        return redirect()->route('course_detail.edit', [$course_id, $courseDetail->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
