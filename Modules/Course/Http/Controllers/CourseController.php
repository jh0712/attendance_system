<?php

namespace Modules\Course\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Modules\Course\Contracts\CourseContract;
use Modules\Member\Contracts\MemberContract;

class CourseController extends Controller
{
    public function __construct(
        public CourseContract $courseRepo
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $table['url'] = route('course_list');
        $table['column'] = [
            ['data' => 'id', 'name' => 'id'],
            ['data' => 'name', 'name' => 'name'],
            ['data' => 'price_of_each', 'name' => 'price_of_each'],
            ['data' => 'detail_btn', 'name' => 'detail_btn'],
        ];
        $table['header'] = ['序號','姓名','單堂價格','編輯'];
        return view('course::index',compact('table'));
    }
    public function list(Request $request): JsonResponse
    {
        $course = $this->courseRepo->all();
        return datatables()->collection($course)
            ->editColumn('detail_btn', function ($data) {
                return "<a href='".route('course.edit',$data->id)."' target='_blank' class='btn btn-sm btn-primary'>detail</a>";
            })
            ->rawColumns(['detail_btn'])
            ->make();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('course::action.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $course = $this->courseRepo->add($request->all());
        return redirect()->route('course.edit',$course->id);
    }

    /**
     * Show the specified resource.
     */
    public function show($id): View
    {
        $course = $this->courseRepo->find($id);
        return view('course::action.edit',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $course = $this->courseRepo->find($id);
        return view('course::action.edit',compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $course = $this->courseRepo->edit($id,$request->all());
        return redirect()->route('course.edit',$course->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
