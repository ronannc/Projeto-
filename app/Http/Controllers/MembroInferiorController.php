<?php

namespace App\Http\Controllers;

//use App\Http\Requests\MembroInferiorStoreRequest;
//use App\Http\Requests\MembroInferiorUpdateRequest;
use App\Models\MembroInferior;
use Illuminate\Http\Request;
use App\Repositories\Contracts\MembroInferiorRepository;
use App\Services\MembroInferiorService;

class MembroInferiorController extends Controller
{
    protected $repository;
    protected $service;


    /**
     * BillingController constructor.
     * @param MembroInferiorRepository $repository
     * @param MembroInferiorService $service
     */
    public function __construct(MembroInferiorRepository $repository, MembroInferiorService $service)
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
     * @param  \App\MembroInferior  $membroInferior
     * @return \Illuminate\Http\Response
     */
    public function show(MembroInferior $membroInferior)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MembroInferior  $membroInferior
     * @return \Illuminate\Http\Response
     */
    public function edit(MembroInferior $membroInferior)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MembroInferior  $membroInferior
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MembroInferior $membroInferior)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MembroInferior  $membroInferior
     * @return \Illuminate\Http\Response
     */
    public function destroy(MembroInferior $membroInferior)
    {
        //
    }
}
