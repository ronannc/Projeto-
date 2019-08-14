<?php


namespace App\Services;

use App\Models\LowerMemberWorkout;
use App\Repositories\Contracts\LowerMemberWorkoutRepository;
use Exception;

class LowerMemberWorkoutService
{
    protected $repository;

    /**
     * StationService constructor.
     *
     * @param $repository
     */
    public function __construct(LowerMemberWorkoutRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(array $data)
    {
        try {
            $store = $this->repository->save($data);
            return $store;
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function update(array $data, LowerMemberWorkout $membro_inferior_treino)
    {

        try {
            $update = $this->repository->update($membro_inferior_treino, $data);
            return $update;
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function delete(LowerMemberWorkout $membro_inferior_treino)
    {
        try {
            $delete = $this->repository->delete($membro_inferior_treino);
            return $delete;
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }


}
