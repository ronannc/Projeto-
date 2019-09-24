<?php

namespace App\Repositories;

use App\Models\BackWorkout;
use App\Models\BicepsWorkout;
use App\Models\BreastWorkout;
use App\Models\City;
use App\Models\Company;
use App\Models\LowerMemberWorkout;
use App\Models\ShoulderWorkout;
use App\Models\TricepsWorkout;
use App\Models\Workout;
use App\Repositories\Contracts\ClientRepository;
use App\Support\BloodType;
use Illuminate\Support\Facades\Auth;

class EloquentClientRepository extends AbstractEloquentRepository implements ClientRepository
{
    public function getExtraData()
    {
        $user = Auth::user();
        if($user->isManager()){
            $extraData['company'] = $user->company()->get();
        }else{
            $extraData['company'] = Company::all();
        }
        $extraData['city'] = City::all();
        $extraData['blood_type'] = BloodType::NAMES;

        return $extraData;
    }

    public function getExerciciosTreino($id)
    {
        $data = Workout::find($id);
        $data['triceps_workout'] = TricepsWorkout::where('workout_id', $id)->get();
        $data['biceps_workout'] = BicepsWorkout::where('workout_id', $id)->get();
        $data['back_workout'] = BackWorkout::where('workout_id', $id)->get();
        $data['shoulder_workout'] = ShoulderWorkout::where('workout_id', $id)->get();
        $data['breast_workout'] = BreastWorkout::where('workout_id', $id)->get();
        $data['lower_member_workout'] = LowerMemberWorkout::where('workout_id', $id)->get();
        return $data;
    }
}
