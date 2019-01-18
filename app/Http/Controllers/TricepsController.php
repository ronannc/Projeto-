<?php

namespace App\Http\Controllers;

//use App\Http\Requests\TricepsStoreRequest;
//use App\Http\Requests\TricepsUpdateRequest;
use App\Models\Triceps;
use Illuminate\Http\Request;
use App\Repositories\Contracts\TricepsRepository;
use App\Services\TricepsService;

class TricepsController extends Controller
{
    protected $repository;
    protected $service;


    /**
     * BillingController constructor.
     * @param TricepsRepository $repository
     * @param TricepsService $service
     */
    public function __construct(TricepsRepository $repository, TricepsService $service)
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
     * @param  \App\Triceps  $triceps
     * @return \Illuminate\Http\Response
     */
    public function show(Triceps $triceps)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Triceps  $triceps
     * @return \Illuminate\Http\Response
     */
    public function edit(Triceps $triceps)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Triceps  $triceps
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Triceps $triceps)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Triceps  $triceps
     * @return \Illuminate\Http\Response
     */
    public function destroy(Triceps $triceps)
    {
        //
    }
}
