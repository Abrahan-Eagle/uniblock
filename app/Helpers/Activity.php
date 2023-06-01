<?php

use App\Models\Events;
use App\Models\Post;

function Activity(){
    /*
        $activity = Post::where('activity', 'ON')
            ->where('statusx', '=', 'PUBLISHED')
            ->orderBy('date_activi', 'DESC')
            ->where('level', 'event')
            ->first();
        $date_activix = $activity->date_activi; //PARA ENVIAR LA FECHA DE LA ACTIVIDAD JS
        */

        $activity = Post::where('activity', '=', 'ON')
        ->where('statusx', '=', 'PUBLISHED')
        ->orderBy('date_activi', 'DESC')
        ->limit(1)
        ->get();
                  
        return view('front.component.bible-study', compact('activity'));

    }
