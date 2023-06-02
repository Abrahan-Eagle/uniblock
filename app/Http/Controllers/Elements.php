<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Elements extends Controller{
    public function Elementos(){
        return view('elementos');
    }
}