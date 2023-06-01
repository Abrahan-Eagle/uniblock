<?php

namespace App\Models\Traits;

trait UserTrait{

      //13-Jul-20
      public function roles(){
        return $this->belongsToMany('App\Models\Role')->withTimestamps();
    }

    //20-jul-20
    public function havePermission($permission){

        foreach ($this->roles as $role) {
            
            if ($role['full-access'] == 'yes' ) {
                //return 'true full-access';
                return true;
            }

            foreach ($role->permissions as $perm) {
                
                if ($perm->slug == $permission) {
                    //return 'true por permiso';
                    return true;
                }   
            }
        }
        return false;
        //return 'false full-access';
        //return false;
        //return $this->roles; 
    }

}
