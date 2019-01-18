<?php

namespace App\Http\Controllers;

//use App\Http\Requests\TreinoStoreRequest;
//use App\Http\Requests\TreinoUpdateRequest;
use App\Models\Treino;
use Illuminate\Http\Request;
use App\Repositories\Contracts\TreinoRepository;
use App\Services\TreinoService;

class TreinoController extends Controller
{
    protected $repository;
    protected $service;


    /**
     * BillingController constructor.
     * @param TreinoRepository $repository
     * @param TreinoService $service
     */
    public function __construct(TreinoRepository $repository, TreinoService $service)
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
     * @param  \App\Treino  $treino
     * @return \Illuminate\Http\Response
     */
    public function show(Treino $treino)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Treino  $treino
     * @return \Illuminate\Http\Response
     */
    public function edit(Treino $treino)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Treino  $treino
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Treino $treino)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Treino  $treino
     * @return \Illuminate\Http\Response
     */
    public function destroy(Treino $treino)
    {
        //
    }
}
