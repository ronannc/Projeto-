<?php

namespace App\Services;

use App\Models\Permission;
use App\Repositories\Contracts\PermissionRepository;
use App\Support\Notify;
use Illuminate\Support\Facades\Log;

class PermissionService
{
    /** @var PermissionRepository */
    private $repository;

    public function __construct(PermissionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(array $data)
    {
        try {
            $store = $this->repository->store($data);

            return $store;
        } catch (\Exception $exception) {
            Log::error(Notify::log($exception));

            return [
                'error'   => true,
                'message' => Notify::ERROR_MESSAGE
            ];
        }
    }

    public function update(array $data, $id)
    {
        try {
            $model = Permission::with([])->findOrFail($id);

            $update = $this->repository->update($model, $data);

            return $update;
        } catch (\Exception $exception) {
            Log::error(Notify::log($exception));

            return [
                'error'   => true,
                'message' => Notify::ERROR_MESSAGE
            ];
        }
    }
}