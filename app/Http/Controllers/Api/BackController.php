<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Repositories\Contracts\BackRepository;
use App\Services\BackService;

class BackController extends Controller
{

    /** @var BackRepository */
    protected $repository;

    /** @var BackService */
    protected $service;

    /**
     * BackController constructor.
     *
     * @param BackRepository $repository
     * @param BackService $service
     */
    public function __construct(BackRepository $repository, BackService $service)
    {
        $this->repository = $repository;
        $this->service = $service;

    }

    public function exerciseByClient($client_id){
        return $this->service->exerciseByClient($client_id);
    }
}
