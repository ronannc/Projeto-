<?php

namespace App\Http\Controllers;

//use App\Http\Requests\OmbroStoreRequest;
//use App\Http\Requests\OmbroUpdateRequest;
use App\Models\Ombro;
use Illuminate\Http\Request;
use App\Repositories\Contracts\OmbroRepository;
use App\Services\OmbroService;

class OmbroController extends Controller
{
    protected $repository;
    protected $service;


    /**
     * BillingController constructor.
     * @param CostaRepository $repository
     * @param CostaService $service
     */
    public function __construct(OmbroRepository $repository, OmbroService $service)
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ombro  $ombro
     * @return \Illuminate\Http\Response
     */
    public function show(Ombro $ombro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ombro  $ombro
     * @return \Illuminate\Http\Response
     */
    public function edit(Ombro $ombro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ombro  $ombro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ombro $ombro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ombro  $ombro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ombro $ombro)
    {
        //
    }
}
