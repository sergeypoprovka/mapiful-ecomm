<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getStates(Country $country){
        return $country->states;
    }

    public function getCities(State $state){
        return $state->cities;
    }
}
