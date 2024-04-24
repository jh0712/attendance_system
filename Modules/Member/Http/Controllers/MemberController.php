<?php

namespace Modules\Member\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Modules\Member\Contracts\MemberContract;
use Modules\Member\Entities\Member;
use Modules\Member\Repositories\MemberRepository;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\DataTables;

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
    public function index(): View
    {
        $table['url'] = '/member_list';
        $table['column'] = [
            ['data' => 'id', 'name' => 'id'],
            ['data' => 'name', 'name' => 'name'],
            ['data' => 'player_number', 'name' => 'player_number'],
            ['data' => 'date_of_birth', 'name' => 'date_of_birth'],
            ['data' => 'type', 'name' => 'type'],
            ['data' => 'note', 'name' => 'note'],
            ['data' => 'detail_btn', 'name' => 'detail_btn'],
        ];
        $table['header'] = ['姓名','電話','球員編號','生日','類別','備註','編輯'];
        return view('member::index',compact('table'));
    }
    public function list(Request $request): JsonResponse
    {
        $member = $this->memberRepo->all();
        return datatables()->collection($member)
        ->editColumn('detail_btn', function ($data) {
            return "<a href='".route('member.edit',$data->id)."' target='_blank' class='btn btn-sm btn-primary'>detail</a>";
        })
        ->rawColumns(['detail_btn'])
        ->make();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('member::action.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $member = $this->memberRepo->add($request->all());
        return redirect()->route('member.edit',$member->id);
    }

    /**
     * Show the specified resource.
     */
    public function show($id): View
    {
        $member = $this->memberRepo->find($id);
        return view('member::action.edit',compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $member = $this->memberRepo->find($id);
        return view('member::action.edit',compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $member = $this->memberRepo->edit($id,$request->all());
        return redirect()->route('member.edit',$member->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
