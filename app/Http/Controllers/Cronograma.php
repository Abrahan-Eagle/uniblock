<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Cronograma extends Controller{
    public function CronogramaA(){
        return view('cronograma');
    }
}