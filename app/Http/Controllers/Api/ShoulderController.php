<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Repositories\Contracts\BicepsRepository;
use App\Repositories\Contracts\ShoulderRepository;
use App\Repositories\Contracts\TricepsRepository;
use App\Services\BicepsService;
use App\Services\ShoulderService;
use App\Services\TricepsService;

class ShoulderController extends Controller
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
    public function __construct(ShoulderRepository $repository, ShoulderService $service)
    {
        $this->repository = $repository;
        $this->service = $service;

    }

    public function exerciseByClient($client_id){
        return $this->service->exerciseByClient($client_id);
    }
}
