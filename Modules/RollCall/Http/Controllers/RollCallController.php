<?php

namespace Modules\RollCall\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Course\Contracts\CourseDetailContract;
use Modules\Member\Contracts\MemberContract;
use Modules\Member\Entities\Member;
use Modules\User\Entities\User;

class RollCallController extends Controller
{
    public function __construct(
        private readonly CourseDetailContract $courseDetailRepo,
        private MemberContract                $memberRepo,
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
    public function create($course_id,$course_detail_id)
    {
        $courseDetail = $this->courseDetailRepo->find($course_detail_id,['course.members']);
        $course = $courseDetail->course;
        $members = $course->members->pluck('member_id');
        $members = $this->memberRepo->find($members->toArray());

        return view('rollcall::action.create',compact('course_id','courseDetail','members','course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
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
    public function edit($course_detail_id)
    {
        return view('rollcall::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
