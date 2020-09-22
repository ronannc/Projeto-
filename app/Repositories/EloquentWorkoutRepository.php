<?php

namespace App\Repositories;


use App\Models\Back;
use App\Models\BackWorkout;
use App\Models\Biceps;
use App\Models\BicepsWorkout;
use App\Models\Breast;
use App\Models\BreastWorkout;
use App\Models\Client;
use App\Models\Goal;
use App\Models\LowerMember;
use App\Models\LowerMemberWorkout;
use App\Models\Shoulder;
use App\Models\ShoulderWorkout;
use App\Models\Triceps;
use App\Models\TricepsWorkout;
use App\Repositories\Contracts\WorkoutRepository;

class EloquentWorkoutRepository extends AbstractEloquentRepository implements WorkoutRepository
{
    public function getExerciciosTreino($id)
    {
        $data = $this->with([])->findOneById($id);
        $data['workout'] = collect();
        foreach (TricepsWorkout::where('workout_id', $data['id'])->get() as $key => $exercicio) {
            $exercicio['type'] = 'Triceps';
            $exercicio['description'] = $exercicio->triceps['exercise'];
            $exercicio['id'] = $exercicio['triceps_id'];
            $data['workout']->push($exercicio);
        }
        foreach (BicepsWorkout::where('workout_id', $data['id'])->get() as $key => $exercicio) {
            $exercicio['type'] = 'Biceps';
            $exercicio['description'] = $exercicio->biceps['exercise'];
            $exercicio['id'] = $exercicio['biceps_id'];
            $data['workout']->push($exercicio);
        }
        foreach (BackWorkout::where('workout_id', $data['id'])->get() as $key => $exercicio) {
            $exercicio['type'] = 'Costas';
            $exercicio['description'] = $exercicio->back['exercise'];
            $exercicio['id'] = $exercicio['back_id'];
            $data['workout']->push($exercicio);
        }
        foreach (ShoulderWorkout::where('workout_id', $data['id'])->get() as $key => $exercicio) {
            $exercicio['type'] = 'Ombros';
            $exercicio['description'] = $exercicio->shoulder['exercise'];
            $exercicio['id'] = $exercicio['shoulder_id'];
            $data['workout']->push($exercicio);
        }
        foreach (BreastWorkout::where('workout_id', $data['id'])->get() as $key => $exercicio) {
            $exercicio['type'] = 'Peito';
            $exercicio['description'] = $exercicio->breast['exercise'];
            $exercicio['id'] = $exercicio['breast_id'];
            $data['workout']->push($exercicio);
        }
        foreach (LowerMemberWorkout::where('workout_id', $data['id'])->get() as $key => $exercicio) {
            $exercicio['type'] = 'Membros-Inferiores';
            $exercicio['description'] = $exercicio->lowerMember['exercise'];
            $exercicio['id'] = $exercicio['lower_member_id'];
            $data['workout']->push($exercicio);
        }
        $data['workout'] = $data['workout']->groupBy('group');
        return $data;
    }

    public function getExtraData()
    {
        return [
            'goal' => Goal::all(),
            'client' => Client::all(),
            'biceps' => Biceps::all(),
            'triceps' => Triceps::all(),
            'back' => Back::all(),
            'breast' => Breast::all(),
            'shoulder' => Shoulder::all(),
            'lower_member' => LowerMember::all(),
        ];
    }

    public function save_triceps_workout($data)
    {
        TricepsWorkout::with([])->create([
            'workout_id' => $data['workout_id'],
            'triceps_id' => $data['triceps_id'],
            'workout_mode_id' => $data['workout_mode_id']
        ]);
    }

    public function update_triceps_workout($data)
    {
        TricepsWorkout::with([])
            ->where('workout_id', $data['workout_id'])
            ->where('triceps_id', $data['triceps_id'])
            ->update($data);
    }

    public function save_biceps_workout($data)
    {
        BicepsWorkout::with([])->create([
            'workout_id' => $data['workout_id'],
            'biceps_id' => $data['biceps_id'],
            'workout_mode_id' => $data['workout_mode_id']
        ]);
    }

    public function update_biceps_workout($data)
    {

        BicepsWorkout::with([])
            ->where('workout_id', $data['workout_id'])
            ->where('biceps_id', $data['biceps_id'])
            ->update($data);
    }

    public function save_back_workout($data)
    {
        BackWorkout::with([])->create([
            'workout_id' => $data['workout_id'],
            'back_id' => $data['back_id'],
            'workout_mode_id' => $data['workout_mode_id']
        ]);
    }

    public function update_back_workout($data)
    {
        BackWorkout::with([])
            ->where('workout_id', $data['workout_id'])
            ->where('back_id', $data['back_id'])
            ->update($data);
    }

    public function save_breast_workout($data)
    {
        BreastWorkout::with([])->create([
            'workout_id' => $data['workout_id'],
            'breast_id' => $data['breast_id'],
            'workout_mode_id' => $data['workout_mode_id']
        ]);
    }

    public function update_breast_workout($data)
    {
        BreastWorkout::with([])
            ->where('workout_id', $data['workout_id'])
            ->where('breast_id', $data['breast_id'])
            ->update($data);
    }

    public function save_shoulder_workout($data)
    {
        ShoulderWorkout::with([])->create([
            'workout_id' => $data['workout_id'],
            'shoulder_id' => $data['shoulder_id'],
            'workout_mode_id' => $data['workout_mode_id']
        ]);
    }

    public function update_shoulder_workout($data)
    {
        ShoulderWorkout::with([])
            ->where('workout_id', $data['workout_id'])
            ->where('shoulder_id', $data['shoulder_id'])
            ->update($data);
    }

    public function save_lower_member_workout($data)
    {

        LowerMemberWorkout::with([])->create([
            'workout_id' => $data['workout_id'],
            'lower_member_id' => $data['lower_member_id'],
            'workout_mode_id' => $data['workout_mode_id']
        ]);
    }

    public function update_lower_member_workout($data)
    {
        LowerMemberWorkout::with([])
            ->where('workout_id', $data['workout_id'])
            ->where('lower_member_id', $data['lower_member_id'])
            ->update($data);
    }


    public function lastWorkout($client_id)
    {
        $client = Client::find($client_id);
        $lastWorkout = $client->lastWorkout();
        return $lastWorkout->exercises();
    }

    public function workouts($client_id)
    {
        $client = Client::find($client_id);
        $workouts = $client->workout();
        foreach ($workouts as $workout) {
            $workout->exercises();
        }
        return $workouts;
    }
}
