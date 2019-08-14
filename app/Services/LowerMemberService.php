<?php


namespace App\Services;

use App\Models\LowerMember;
use App\Repositories\Contracts\LowerMemberRepository;
use Exception;

class LowerMemberService
{
    protected $repository;

    /**
     * StationService constructor.
     *
     * @param $repository
     */
    public function __construct(LowerMemberRepository $repository)
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

    public function update(array $data, LowerMember $membroInferior)
    {

        try {
            $update = $this->repository->update($membroInferior, $data);
            return $update;
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function delete(LowerMember $membroInferior)
    {
        try {
            $delete = $this->repository->delete($membroInferior);
            return $delete;
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }


}
