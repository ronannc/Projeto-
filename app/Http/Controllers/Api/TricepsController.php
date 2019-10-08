<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Repositories\Contracts\BicepsRepository;
use App\Repositories\Contracts\TricepsRepository;
use App\Services\BicepsService;
use App\Services\TricepsService;

class TricepsController extends Controller
{

    /** @var BicepsRepository */
    protected $repository;

    /** @var BicepsService */
    protected $service;

    /**
     * BicepsController constructor.
     *
     * @param BicepsRepository $repository
     * @param BicepsService    $service
     */
    public function __construct(TricepsRepository $repository, TricepsService $service)
    {
        $this->repository = $repository;
        $this->service = $service;

    }

    public function exerciseByClient($client_id){
        return $this->service->exerciseByClient($client_id);
    }
}