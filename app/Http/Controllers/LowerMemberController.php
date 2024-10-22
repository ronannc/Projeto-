<?php

namespace App\Http\Controllers;


use App\DataTables\LowerMemberDataTable;
use App\Http\Requests\LowerMemberCreateRequest;
use App\Http\Requests\LowerMemberUpdateRequest;
use App\Models\LowerMember;
use App\Repositories\Contracts\LowerMemberRepository;
use App\Services\LowerMemberService;
use Illuminate\Http\Response;

class LowerMemberController extends Controller
{
    /** @var LowerMemberRepository */
    protected $repository;

    /** @var LowerMemberService */
    protected $service;

    /**
     * LowerMemberController constructor.
     *
     * @param LowerMemberRepository $repository
     * @param LowerMemberService    $service
     */
    public function __construct(LowerMemberRepository $repository, LowerMemberService $service)
    {
        $this->repository = $repository;
        $this->service = $service;

        $this->middleware('permission:list_lower_member');
        $this->middleware('permission:add_lower_member', ['only' => ['create','store']]);
        $this->middleware('permission:edit_lower_member', ['only' => ['edit','update']]);
        $this->middleware('permission:destroy_lower_member', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param LowerMemberDataTable $dataTable
     *
     * @return Response
     */
    public function index(LowerMemberDataTable $dataTable)
    {
        $resource = 'Listagem de exercícios de membros inferiores';
        return $dataTable->render('components.datatable', compact('resource'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('layouts.lower-members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param LowerMemberCreateRequest $request
     *
     * @return Response
     */
    public function store(LowerMemberCreateRequest $request)
    {
        $response = $this->service->store($request->all());

        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);
            return back()->withInput();
        }

        session()->flash('status', 'Adicionado com sucesso !');
        return redirect(route('lower-members.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param LowerMember $lowerMember
     *
     * @return Response
     */
    public function show(LowerMember $lowerMember)
    {
        return view('layouts.lower-members.show', compact('lowerMember'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $model = $this->repository->findOneById($id);
        return view('layouts.lower-members.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param LowerMemberUpdateRequest $request
     * @param                          $id
     *
     * @return Response
     */
    public function update(LowerMemberUpdateRequest $request, $id)
    {
        $response = $this->service->update($request->all(), $id);

        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Atualizado com sucesso!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $response = $this->service->destroy($id);

        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);
            return back()->withInput();
        }

        session()->flash('success', 'Deletado com sucesso!');

        return back();
    }
}
