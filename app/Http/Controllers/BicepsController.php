<?php

namespace App\Http\Controllers;

use App\Http\Requests\BicepsStoreRequest;
use App\Http\Requests\BicepsUpdateRequest;
use App\Models\Biceps;
use Illuminate\Http\Request;
use App\Repositories\Contracts\BicepsRepository;
use App\Services\BicepsService;

class BicepsController extends Controller
{

    protected $repository;
    protected $service;


    /**
     * BillingController constructor.
     * @param BicepsRepository $repository
     * @param BicepsService $service
     */
    public function __construct(BicepsRepository $repository, BicepsService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $biceps = Biceps::all();
        return view('layouts.biceps.index', compact('biceps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.biceps.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
//        dd($data);
        $resultFromStoreBiceps = $this->service->store($data);

        if (!empty($resultFromStoreBiceps['error'])) {
            session()->flash('error', $resultFromStoreBiceps['message']);
            return back()->withInput();
        }

        session()->flash('status', 'Faturamento adicionado com sucesso !');
        return redirect(route('biceps.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Biceps  $biceps
     * @return \Illuminate\Http\Response
     */
    public function show(Biceps $biceps)
    {
        $extraData = $this->repository->getExtraData();
        return view('layouts.billings.show', compact('extraData'), compact('billing'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Biceps  $biceps
     * @return \Illuminate\Http\Response
     */
    public function edit(Biceps $biceps)
    {
        $extraData = $this->repository->getExtraData();
        return view('layouts.billings.edit', compact('extraData'), compact('billing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Biceps  $biceps
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Biceps $biceps)
    {
        $data = $request->all();
        $resultFromUpdateBilling = $this->service->update($data, $billing);
        if (!empty($resultFromUpdateBilling['error'])) {
            session()->flash('error', $resultFromUpdateBilling['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Faturamento atualizado com sucesso!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Biceps  $biceps
     * @return \Illuminate\Http\Response
     */
    public function destroy(Biceps $biceps)
    {
        $resultFromDeleteBilling = $this->service->delete($billing);
        if (!empty($resultFromDeleteBilling['error'])) {
            session()->flash('error', $resultFromDeleteBilling['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Faturamento deletado com sucesso!');
        return redirect(route('billings.index'));
    }
}
