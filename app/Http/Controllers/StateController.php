<?php

namespace App\Http\Controllers;

use App\Models\State;

class StateController extends Controller
{
    /**
     * Retorna todas as cidades de um dado estado.
     *
     * @param $stateId
     *
     * @return string
     */
    public function getCities($stateId)
    {
        $cities = State::with([])->find($stateId)->cities;
        $options = '';

        foreach ($cities as $city) {
            $options .= '<option value="' . $city['id'] . '">' . $city['name'] . '</option>';
        }

        return $options;
    }
}
