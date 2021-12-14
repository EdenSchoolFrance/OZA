<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Client;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('permission', 'ADMIN')->first();
        $role_expert = Role::where('permission', 'EXPERT')->first();
        $role_manager = Role::where('permission', 'MANAGER')->first();
        $role_editor = Role::where('permission', 'EDITOR')->first();
        $role_reader = Role::where('permission', 'READER')->first();

        $user = new User();
        $user->id = uniqid();
        $user->lastname = "Latsname Admin Oza";
        $user->firstname = "Firstname Admin Oza";
        $user->email = "adminoza@gmail.com";
        $user->phone = "0614875412";
        $user->post = "Poste";
        $user->password = "test";
        $user->oza = 1;
        $user->role()->associate($role_admin);
        $user->save();

        $user = new User();
        $user->id = uniqid();
        $user->lastname = "Latsname Expert Oza";
        $user->firstname = "Firstname Expert Oza";
        $user->email = "expertoza@gmail.com";
        $user->phone = "0614875412";
        $user->post = "Poste";
        $user->password = "test";
        $user->oza = 1;
        $user->role()->associate($role_expert);
        $user->save();

        $user = new User();
        $user->id = uniqid();
        $user->lastname = "Latsname Admin Client";
        $user->firstname = "Firstname Admin Client";
        $user->email = "adminclient@gmail.com";
        $user->phone = "0614875412";
        $user->post = "Poste";
        $user->password = "test";
        $user->role()->associate($role_admin);
        $user->save();
    }
}
