<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Repositories\Contracts\TricepsRepository;
use App\Services\TricepsService;

class TricepsController extends Controller
{

    /** @var TricepsRepository */
    protected $repository;

    /** @var TricepsService */
    protected $service;

    /**
     * TricepsController constructor.
     *
     * @param TricepsRepository $repository
     * @param TricepsService $service
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
