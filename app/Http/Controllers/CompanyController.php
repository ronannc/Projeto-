<?php

namespace App\Http\Controllers;

use App\DataTables\CompanyDataTable;
use App\Models\Company;
use App\Repositories\Contracts\CompanyRepository;
use App\Services\CompanyService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CompanyController extends Controller
{

    protected $repository;
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
        return $dataTable->render('layouts.company.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('layouts.company.create');
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
        return view('layouts.company.show', compact('company'));
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
        $company = Company::find($id);
        return view('layouts.company.edit', compact('company'));
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
        $company = Company::find($id);

        $response = $this->service->update($request->all(), $company);
        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Atualizado com sucesso!');

        return redirect(route('company.index'));
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
        $company = Company::find($id);

        $response = $this->service->delete($company);
        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Deletado com sucesso!');
        return redirect(route('company.index'));
    }
}