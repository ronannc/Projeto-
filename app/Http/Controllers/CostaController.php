<?php

namespace App\Http\Controllers;

//use App\Http\Requests\CostaStoreRequest;
//use App\Http\Requests\CostaUpdateRequest;
use App\Models\Costa;
use Illuminate\Http\Request;
use App\Repositories\Contracts\CostaRepository;
use App\Services\CostaService;

class CostaController extends Controller
{
    protected $repository;
    protected $service;


    /**
     * BillingController constructor.
     * @param CostaRepository $repository
     * @param CostaService $service
     */
    public function __construct(CostaRepository $repository, CostaService $service)
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
     * @param  \App\Costa  $costa
     * @return \Illuminate\Http\Response
     */
    public function show(Costa $costa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Costa  $costa
     * @return \Illuminate\Http\Response
     */
    public function edit(Costa $costa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Costa  $costa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Costa $costa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Costa  $costa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Costa $costa)
    {
        //
    }
}
