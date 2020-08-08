<?php


namespace App\Services;

use App\Models\BackWorkout;
use App\Models\BicepsWorkout;
use App\Models\BreastWorkout;
use App\Models\Client;
use App\Models\LowerMemberWorkout;
use App\Models\Shoulder;
use App\Models\ShoulderWorkout;
use App\Models\TricepsWorkout;
use App\Repositories\Contracts\WorkoutRepository;
use App\Support\Notify;
use Illuminate\Support\Facades\Log;

class WorkoutService
{
    protected $repository;

    /**
     * StationService constructor.
     *
     * @param $repository
     */
    public function __construct(WorkoutRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(array $data)
    {
        try {
            return $this->repository->store($data);
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
        $model = $this->repository->findOneById($id);
        try {
            return $this->repository->update($model, $data);
        } catch (\Exception $exception) {
            Log::error(Notify::log($exception));


            return [
                'error'   => true,
                'message' => Notify::ERROR_MESSAGE
            ];
        }
    }

    public function destroy($id)
    {
        $model = $this->repository->findOneById($id);

        TricepsWorkout::where('workout_id', $id)->delete();
        ShoulderWorkout::where('workout_id', $id)->delete();
        LowerMemberWorkout::where('workout_id', $id)->delete();
        BicepsWorkout::where('workout_id', $id)->delete();
        BackWorkout::where('workout_id', $id)->delete();
        BreastWorkout::where('workout_id', $id)->delete();

        try {
            return $model->delete();
        } catch (\Exception $exception) {

            Log::error(Notify::log($exception));

            return [
                'error'   => true,
                'message' => Notify::ERROR_MESSAGE
            ];
        }
    }

    public function process_data($data)
    {
        $physical_assessments = collect();
        if (isset($data['formula'])) {
            $physical_assessments = Client::find($data['client_id'])->physicalAssessment;
            if($physical_assessments->count() > 0){
                $physical_assessments = $physical_assessments->last();
            }else{
                session()->flash('warning', 'Para calculo de carga ideal, é necessario cadastrar uma avaliação fisica');
            }
        }
        //tem que receber o peso do client para calcular a carga segundo a formula
        $collect = array();
        foreach ($data as $key => $aux) {
            $aux_key = explode('_', $key);
            if (count($aux_key) == 3) {
                $collect[$aux_key[1]][$aux_key[2]][$aux_key[0]] = $aux;
                if (isset($data['formula']) && $physical_assessments->count() > 0) {
                    if ($aux_key[0] == "load") {
                        $rep = $collect[$aux_key[1]][$aux_key[2]]['repetition'];
                        $kg = $collect[$aux_key[1]][$aux_key[2]]['load'];
                        $collect[$aux_key[1]][$aux_key[2]]['load'] = $this->formula($kg, $rep, $physical_assessments['weight'],
                            $data['porcentagem']);
                    }
                }
            }
        }

        return $collect;
    }

    public function formula($carga, $repeticceos, $pesoClient, $porcentagem)
    {
        return (((($carga * 100) / abs(102.78 - (2.78 * $repeticceos))) / $pesoClient) * ($porcentagem / 100)) * $pesoClient;
    }

    public function lastWorkour($client_id)
    {
        return $this->repository->lastWorkout($client_id);
    }

    public function workouts($client_id)
    {
        return $this->repository->workouts($client_id);
    }

}
