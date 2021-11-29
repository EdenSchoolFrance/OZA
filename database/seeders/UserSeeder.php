<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
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
        $role_superadmin = Role::where('permission', 'SUPER_ADMIN')->first();
        $role_admin = Role::where('permission', 'ADMIN')->first();
        $role_expert = Role::where('permission', 'EXPERT')->first();
        $role_editor = Role::where('permission', 'EDITOR')->first();
        $role_reader = Role::where('permission', 'READER')->first();

        $user = new User();
        $user->id = uniqid();
        $user->lastname = "Latsname SuperAdmin Oza";
        $user->firstname = "Firstname SuperAdmin Oza";
        $user->email = "superadminoza@gmail.com";
        $user->username = "SuperAdminOza";
        $user->password = "test";
        $user->oza = 1;
        $user->role()->associate($role_superadmin);
        $user->save();

        $user = new User();
        $user->id = uniqid();
        $user->lastname = "Latsname Admin Oza";
        $user->firstname = "Firstname Admin Oza";
        $user->email = "adminoza@gmail.com";
        $user->username = "AdminOza";
        $user->password = "test";
        $user->oza = 1;
        $user->role()->associate($role_admin);
        $user->save();

        $user = new User();
        $user->id = uniqid();
        $user->lastname = "Latsname Expert Oza";
        $user->firstname = "Firstname Expert Oza";
        $user->email = "expertoza@gmail.com";
        $user->username = "ExpertOza";
        $user->password = "test";
        $user->oza = 1;
        $user->role()->associate($role_expert);
        $user->save();



        $user = new User();
        $user->id = uniqid();
        $user->lastname = "Latsname SuperAdmin Client";
        $user->firstname = "Firstname SuperAdmin Client";
        $user->email = "superadminclient@gmail.com";
        $user->username = "SuperAdminClient";
        $user->password = "test";
        $user->role()->associate($role_superadmin);
        $user->save();
    }
}
