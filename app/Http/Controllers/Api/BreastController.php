<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Repositories\Contracts\BreastRepository;
use App\Services\BreastService;

class BreastController extends Controller
{

    /** @var BreastRepository */
    protected $repository;

    /** @var BreastService */
    protected $service;

    /**
     * BreastController constructor.
     *
     * @param BreastRepository $repository
     * @param BreastService $service
     */
    public function __construct(BreastRepository $repository, BreastService $service)
    {
        $this->repository = $repository;
        $this->service = $service;

    }

    public function exerciseByClient($client_id){
        return $this->service->exerciseByClient($client_id);
    }
}
