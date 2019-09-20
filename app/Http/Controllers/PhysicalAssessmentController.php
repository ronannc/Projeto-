<?php

namespace App\Http\Controllers;


use App\DataTables\PhysicalAssessmentDataTable;
use App\Models\PhysicalAssessment;
use App\Repositories\Contracts\PhysicalAssessmentRepository;
use App\Services\PhysicalAssessmentService;
use Illuminate\Http\Request;
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
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
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
        $extraData = $this->repository->getExtraData();

        return view('layouts.physical-assessments.edit', compact('model'), compact('extraData'));
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
