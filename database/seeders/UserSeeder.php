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
        $user->lastname = "Delafontaine";
        $user->firstname = "Eric";
        $user->email = "adminoza@gmail.com";
        $user->phone = "0614875412";
        $user->post = "Poste";
        $user->password = "password";
        $user->oza = 1;
        $user->first_connection = 0;
        $user->role()->associate($role_admin);
        $user->save();

        $user = new User();
        $user->id = uniqid();
        $user->lastname = "Delacours";
        $user->firstname = "Jean";
        $user->email = "expertoza@gmail.com";
        $user->phone = "0614875412";
        $user->post = "Poste";
        $user->password = "password";
        $user->oza = 1;
        $user->first_connection = 0;
        $user->role()->associate($role_expert);
        $user->save();

        $user = new User();
        $user->id = uniqid();
        $user->lastname = "Vic";
        $user->firstname = "Julien";
        $user->email = "adminclient@gmail.com";
        $user->phone = "0614875412";
        $user->post = "Poste";
        $user->password = "password";
        $user->first_connection = 0;
        $user->role()->associate($role_admin);
        $user->save();

        $user = new User();
        $user->id = uniqid();
        $user->lastname = "Doe";
        $user->firstname = "Julie";
        $user->email = "managerclient@gmail.com";
        $user->phone = "0614875412";
        $user->post = "Poste";
        $user->password = "password";
        $user->first_connection = 0;
        $user->role()->associate($role_manager);
        $user->save();

        $user = new User();
        $user->id = uniqid();
        $user->lastname = "Martinez";
        $user->firstname = "Jean pierre";
        $user->email = "editorclient@gmail.com";
        $user->phone = "0614875412";
        $user->post = "Poste";
        $user->password = "password";
        $user->first_connection = 0;
        $user->role()->associate($role_editor);
        $user->save();

        $user = new User();
        $user->id = uniqid();
        $user->lastname = "Auriol";
        $user->firstname = "Jhon";
        $user->email = "readerclient@gmail.com";
        $user->phone = "0614875412";
        $user->post = "Poste";
        $user->password = "password";
        $user->first_connection = 0;
        $user->role()->associate($role_reader);
        $user->save();
    }
}
