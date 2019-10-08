<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Repositories\Contracts\TricepsRepository;
use App\Repositories\Contracts\WorkoutRepository;
use App\Services\TricepsService;
use App\Services\WorkoutService;

class WorkoutController extends Controller
{

    /** @var WorkoutRepository */
    protected $repository;

    /** @var WorkoutService */
    protected $service;

    /**
     * WorkoutController constructor.
     *
     * @param WorkoutRepository $repository
     * @param WorkoutService $service
     */
    public function __construct(WorkoutRepository $repository, WorkoutService $service)
    {
        $this->repository = $repository;
        $this->service = $service;

    }

    public function lastWorkout($client_id){
        return $this->service->lastWorkour($client_id);
    }

    public function workouts($client_id){
        return $this->service->workouts($client_id);
    }
}
