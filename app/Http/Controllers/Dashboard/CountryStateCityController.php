<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class CountryStateCityController extends Controller
{
    
    public function getState(Request $request){
        $data['states'] = State::where("countries_id", $request -> countries_id) ->get(["name","id"]);
        return response()->json($data);
    }
    
    public function getCity(Request $request){
        $data['cities'] = City::where("state_id",$request->state_id)->get(["name","id"]);
        return response()->json($data);
    }

}
