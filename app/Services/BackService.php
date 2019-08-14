<?php


namespace App\Services;

use App\Models\Costa;
use App\Repositories\Contracts\BackRepository;

class BackService
{
    protected $repository;

    /**
     * StationService constructor.
     * @param $repository
     */
    public function __construct(BackRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(array $data)
    {
        try {
            $store = $this->repository->save($data);
            return $store;
        } catch (\Exception $exception) {
            return [
                'error' => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function update(array $data, Costa $costa)
    {

        try {
            $update = $this->repository->update($costa, $data);
            return $update;
        } catch (\Exception $exception) {
            return [
                'error' => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function delete(Costa $costa)
    {
        try {
            $delete = $this->repository->delete($costa);
            return $delete;
        } catch (\Exception $exception) {
            return [
                'error' => true,
                'message' => $exception->getMessage()
            ];
        }
    }


}
