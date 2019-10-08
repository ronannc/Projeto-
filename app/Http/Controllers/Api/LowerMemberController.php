<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Repositories\Contracts\LowerMemberRepository;
use App\Services\LowerMemberService;

class LowerMemberController extends Controller
{

    /** @var LowerMemberRepository */
    protected $repository;

    /** @var LowerMemberService */
    protected $service;

    /**
     * LowerMemberController constructor.
     *
     * @param LowerMemberRepository $repository
     * @param LowerMemberService $service
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
