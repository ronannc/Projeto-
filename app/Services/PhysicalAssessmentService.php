<?php


namespace App\Services;

use App\Models\PhysicalAssessment;
use App\Repositories\Contracts\PhysicalAssessmentRepository;
use Exception;

class PhysicalAssessmentService
{
    protected $repository;

    /**
     * StationService constructor.
     *
     * @param $repository
     */
    public function __construct(PhysicalAssessmentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(array $data)
    {
        try {
            $store = $this->repository->store($data);
            return $store;
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function update(array $data, PhysicalAssessment $physicalAssessment)
    {

        try {
            $update = $this->repository->update($physicalAssessment, $data);
            return $update;
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function delete(PhysicalAssessment $physicalAssessment)
    {
        try {
            $delete = $this->repository->delete($physicalAssessment);
            return $delete;
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }


}
