<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Repositories\Contracts\BicepsRepository;
use App\Repositories\Contracts\LowerMemberRepository;
use App\Repositories\Contracts\TricepsRepository;
use App\Services\BicepsService;
use App\Services\LowerMemberService;
use App\Services\TricepsService;

class LowerMemberController extends Controller
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
    public function __construct(LowerMemberRepository $repository, LowerMemberService $service)
    {
        $this->repository = $repository;
        $this->service = $service;

    }

    public function exerciseByClient($client_id){
        return $this->service->exerciseByClient($client_id);
    }
}
