<?php

namespace Modules\Course\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Course\Contracts\CourseDetailContract;

class CourseDetailController extends Controller
{
    public function __construct(
        public CourseDetailContract $courseDetailRepo
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index($course_id): View
    {
        $table['url'] = route("course_detail_list", $course_id);
        $table['column'] = [
            ['data' => 'id', 'name' => 'id'],
            ['data' => 'name', 'name' => 'name'],
            ['data' => 'open_date', 'name' => 'open_date'],
            ['data' => 'type', 'name' => 'type'],
            ['data' => 'detail_btn', 'name' => 'detail_btn'],
        ];
        $table['header'] = ['序號', '內容名稱', '開啟時間', '類別', '編輯'];
        return view('course::course_detail.action.index', compact('table', 'course_id'));
    }

    public function list(Request $request, $course_id): JsonResponse
    {
        $courseDetail = $this->courseDetailRepo->getmodel()
            ->where('course_id', $course_id)->get();
        return datatables()->collection($courseDetail)
            ->editColumn('detail_btn', function ($data) {
                return "<a href='" . route('course_detail.edit', [$data->course_id, $data->id]) . "' target='_blank' class='btn btn-sm btn-primary'>edit</a>";
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
        $attr = $request->all();
        $attr['course_id'] = $course_id;
        $courseDetail = $this->courseDetailRepo->add($attr);
        return redirect()->route('course_detail.edit', [$course_id, $courseDetail->id]);
    }

    /**
     * Show the specified resource.
     */
    public function show($course_id, $detail_id): View
    {
        $courseDetail = $this->courseDetailRepo->find($detail_id);
        return view('course::course_detail.action.edit', compact('courseDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($course_id, $detail_id): View
    {
        $courseDetail = $this->courseDetailRepo->find($detail_id);
        return view('course::course_detail.action.edit', compact('courseDetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $course_id, $detail_id): RedirectResponse
    {
        $courseDetail = $this->courseDetailRepo->edit($detail_id, $request->all());
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
