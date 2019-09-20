<?php

namespace App\Http\Controllers;

use App\DataTables\CompanyDataTable;
use App\Http\Requests\CompanyCreateRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Models\City;
use App\Models\Company;
use App\Repositories\Contracts\CompanyRepository;
use App\Services\CompanyService;
use Illuminate\Http\Response;

class CompanyController extends Controller
{
    /** @var CompanyRepository */
    protected $repository;

    /** @var CompanyService */
    protected $service;

    /**
     * CompanyController constructor.
     *
     * @param CompanyRepository $repository
     * @param CompanyService    $service
     */
    public function __construct(CompanyRepository $repository, CompanyService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @param CompanyDataTable $dataTable
     *
     * @return Response
     */
    public function index(CompanyDataTable $dataTable)
    {
        $resource = 'Listagem de empresas';
        return $dataTable->render('components.datatable', compact('resource'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $extraData['company'] = Company::all();
        $extraData['city'] = City::all();

        return view('layouts.companies.create', compact('extraData'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CompanyCreateRequest $request
     *
     * @return Response
     */
    public function store(CompanyCreateRequest $request)
    {
        $response = $this->service->store($request->all());

        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);
            return back()->withInput();
        }

        session()->flash('status', 'Adicionado com sucesso !');
        return redirect(route('company.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     *
     * @return Response
     */
    public function show(Company $company)
    {
        return view('layouts.companies.show', compact('company'));
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
        $extraData['company'] = Company::all();
        $extraData['city'] = City::all();

        $model = $this->repository->findOneById($id);

        return view('layouts.companies.edit', compact('extraData'), compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CompanyUpdateRequest $request
     * @param                      $id
     *
     * @return Response
     */
    public function update(CompanyUpdateRequest $request, $id)
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
