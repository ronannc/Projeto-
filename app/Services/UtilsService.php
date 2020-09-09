<?php


namespace App\Services;

class UtilsService
{
//    protected $repository;
//
//    /**
//     * StationService constructor.
//     *
//     * @param $repository
//     */
//    public function __construct(WorkoutRepository $repository)
//    {
//        $this->repository = $repository;
//    }

    public function formatDateYMD($date){
        return date('Y-m-d', strtotime(str_replace('/', '.', $date)));
    }
}
