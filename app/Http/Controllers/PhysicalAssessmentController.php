<?php

namespace App\Http\Controllers;


use App\DataTables\PhysicalAssessmentDataTable;
use App\Http\Requests\PhysicalAssessmentCreateRequest;
use App\Http\Requests\PhysicalAssessmentUpdateRequest;
use App\Models\PhysicalAssessment;
use App\Repositories\Contracts\PhysicalAssessmentRepository;
use App\Services\PhysicalAssessmentService;
use Illuminate\Http\Response;

class PhysicalAssessmentController extends Controller
{
    /** @var PhysicalAssessmentRepository */
    protected $repository;

    /** @var PhysicalAssessmentService */
    protected $service;

    /**
     * PhysicalAssessmentController constructor.
     *
     * @param PhysicalAssessmentRepository $repository
     * @param PhysicalAssessmentService    $service
     */
    public function __construct(PhysicalAssessmentRepository $repository, PhysicalAssessmentService $service)
    {
        $this->repository = $repository;
        $this->service = $service;

        $this->middleware('permission:list_physical_assessment');
        $this->middleware('permission:add_physical_assessment', ['only' => ['create','store']]);
        $this->middleware('permission:edit_physical_assessment', ['only' => ['edit','update']]);
        $this->middleware('permission:destroy_physical_assessment', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param PhysicalAssessmentDataTable $dataTable
     *
     * @return Response
     */
    public function index(PhysicalAssessmentDataTable $dataTable)
    {
        $resource = 'Listagem de avaliações físicas';
        return $dataTable->render('components.datatable', compact('resource'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $extraData = $this->repository->getExtraData();
        return view('layouts.physical-assessments.create', compact('extraData'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PhysicalAssessmentCreateRequest $request
     *
     * @return Response
     */
    public function store(PhysicalAssessmentCreateRequest $request)
    {
        $response = $this->service->store($request->all());

        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);
            return back()->withInput();
        }

        session()->flash('status', 'Adicionado com sucesso !');
        return redirect(route('physical-assessments.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param PhysicalAssessment $PhysicalAssessment
     *
     * @return Response
     */
    public function show(PhysicalAssessment $PhysicalAssessment)
    {
        return view('layouts.physical-assessments.show', compact('PhysicalAssessment'));
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
        $model['height'] = $model['height'] * 100;
        $model['weight'] = $model['weight'] * 100;
        $extraData = $this->repository->getExtraData();

        return view('layouts.physical-assessments.edit', compact('model'), compact('extraData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PhysicalAssessmentUpdateRequest $request
     * @param                                 $id
     *
     * @return Response
     */
    public function update(PhysicalAssessmentUpdateRequest $request, $id)
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
