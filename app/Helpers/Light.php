<?php

if (!function_exists('user')) {
    /**
     ** @return \Illuminate\Contracts\Auth\Authenticatable|null|App\Models\User
    */
    
    function Light(){
        
        if (!empty(auth()->user())) {
            $lightdark = auth()->user() -> light;
            return $lightdark;
        }
    }
}
