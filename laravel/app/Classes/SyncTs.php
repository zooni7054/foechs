<?php

namespace App\Classes;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SyncTs
{

    public function users(){

        $this->makeSuperAdmin();

    }

    public function makeSuperAdmin(){

        $user = User::where('email', 'admin@foechs.com')->first();

        if(!$user){
            $user = new User;
            $user->name = "Adminstrator";
            $user->email = "admin@foechs.com";
            $user->password = Hash::make("Foechs@786");
            $user->status = 1;
            $user->save();

            $user->assignRole("Super Admin");
        }

    }
}