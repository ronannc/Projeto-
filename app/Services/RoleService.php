<?php

namespace App\Services;

use App\Models\Role;
use App\Repositories\Contracts\RoleRepository;
use App\Support\Notify;
use Illuminate\Support\Facades\Log;

class RoleService
{
    /** @var RoleRepository */
    private $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function store(array $data)
    {
        try {
            $permissions = $data['permissions'];
            unset($data['permissions']);

            $store = $this->roleRepository->store($data);

            /** @var Role $role */
            $role = $this->roleRepository->findOneById($store->id);
            $role->syncPermissions($permissions);

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
            $permissions = $data['permissions'];

            unset($data['permissions']);

            /** @var Role $role */
            $role = $this->roleRepository->findOneById($id);
            $update = $this->roleRepository->update($role, $data);

            $role->syncPermissions($permissions);

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
