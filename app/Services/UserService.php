<?php


namespace App\Services;

use App\Models\User;
use App\Repositories\Contracts\UserRepository;

class UserService
{
    protected $repository;

    /**
     * StationService constructor.
     * @param $repository
     */
    public function __construct(UserRepository $repository)
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

    public function update(array $data, User $user)
    {

        try {
            $update = $this->repository->update($user, $data);
            return $update;
        } catch (\Exception $exception) {
            return [
                'error' => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function delete(User $user)
    {
        try {
            $delete = $this->repository->delete($user);
            return $delete;
        } catch (\Exception $exception) {
            return [
                'error' => true,
                'message' => $exception->getMessage()
            ];
        }
    }


}
