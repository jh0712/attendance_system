<?php

namespace Modules\Member\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Member\Contracts\MemberContract;
use Modules\Member\Entities\Member;
use Modules\Member\Repositories\MemberRepository;

class MemberController extends Controller
{
    public function __construct(
        public MemberContract $memberRepo
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::paginate(15);
        return view('member::index',compact('members'));
    }
    public function list()
    {
        $this->memberRepo->all();
        return view('member::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('member::create');
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
        return view('member::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('member::edit');
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
