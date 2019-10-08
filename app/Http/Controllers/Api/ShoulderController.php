<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ShoulderRepository;
use App\Services\ShoulderService;

class ShoulderController extends Controller
{

    /** @var ShoulderRepository */
    protected $repository;

    /** @var ShoulderService */
    protected $service;

    /**
     * ShoulderController constructor.
     *
     * @param ShoulderRepository $repository
     * @param ShoulderService $service
     */
    public function __construct(ShoulderRepository $repository, ShoulderService $service)
    {
        $this->repository = $repository;
        $this->service = $service;

    }

    public function exerciseByClient($client_id){
        return $this->service->exerciseByClient($client_id);
    }
}
