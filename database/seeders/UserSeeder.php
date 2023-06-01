<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //TRUNCATE TABLES
    /*
    DB::statement("SET foreign_key_checks=0");
    DB::table('role_user')->truncate();
    DB::table('permission_role')->truncate();
    Permission::truncate();
    Permission::truncate();
    DB::statement("SET foreign_key_checks=1");
    */
    // VARIABLE OF USERS PRE-DESIGN

    $users = [
    [
    'name' => 'admin',
    'email' => 'admin@admin',
    'password' => bcrypt('admin'),
    ],
    [
    'name' => 'aipp',
    'email' => '123@123',
    'password' => bcrypt('123'),
    ],
    [
    'name' => 'xxx',
    'email' => 'xxx@xxx',
    'password' => Hash::make('xxx'),
    ]
    ];

    //DELETE USERS CREATE

    $del_user = User::where('email', 'admin@admin')->first();

    if ($del_user) {
    $del_user -> delete();
    }


    //CREATE USERS

    foreach ($users as $user) {
    User::create( $user );
    }

    $userAdmin = User::where('email', 'admin@admin')->first();
    //CREATE USERS OF TESTING

    //factory(User::class, 20)->create();
    //$user = User::factory()->create();
    User::factory()->times(20)->create();



    //CREATE ROLES OF USER ADMIN
    /*
    $rolAdmin = Role::create([
    'name' => 'Admin',
    'slug' => 'admin',
    'description' => 'Admin',
    'full-access' => 'yes',
    ]);
    */
    $rolAdmin = Role::where('slug', 'admin')->first();
    //table role_user

    $userAdmin->roles()->sync([ $rolAdmin -> id ]);
    }
}
