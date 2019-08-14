<?php

namespace App\Http\Controllers;


use App\DataTables\LowerMemberDataTable;
use App\Models\LowerMember;
use App\Repositories\Contracts\LowerMemberRepository;
use App\Services\LowerMemberService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LowerMemberController extends Controller
{

    protected $repository;
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
        return $dataTable->render('layouts.lower-member.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('layouts.lower-member.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $resultFromStoreLowerMember = $this->service->store($data);

        if (!empty($resultFromStoreLowerMember['error'])) {
            session()->flash('error', $resultFromStoreLowerMember['message']);
            return back()->withInput();
        }

        session()->flash('status', 'LowerMember adicionado com sucesso !');
        return redirect(route('LowerMember.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param LowerMember $LowerMember
     *
     * @return Response
     */
    public function show(LowerMember $LowerMember)
    {
        return view('layouts.lower-member.show', compact('LowerMember'));
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
        $LowerMember = LowerMember::find($id);
//        dd($LowerMember);
        return view('layouts.lower-member.edit', compact('LowerMember'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param         $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $LowerMember = LowerMember::find($id);

        $resultFromUpdateLowerMember = $this->service->update($data, $LowerMember);
        if (!empty($resultFromUpdateLowerMember['error'])) {
            session()->flash('error', $resultFromUpdateLowerMember['message']);
            return back()->withInput();
        }
        session()->flash('success', 'LowerMember atualizado com sucesso!');

        return redirect(route('LowerMember.index'));
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
//        dd($id);
        $LowerMember = LowerMember::find($id);

        $resultFromDeleteLowerMember = $this->service->delete($LowerMember);
        if (!empty($resultFromDeleteLowerMember['error'])) {
            session()->flash('error', $resultFromDeleteLowerMember['message']);
            return back()->withInput();
        }
        session()->flash('success', 'LowerMember deletado com sucesso!');
        return redirect(route('LowerMember.index'));
    }
}
