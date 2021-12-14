<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->id = uniqid();
        $role->name = "Administrateur";
        $role->permission = "ADMIN";
        $role->save();

        $role = new Role();
        $role->id = uniqid();
        $role->name = "Expert";
        $role->permission = "EXPERT";
        $role->save();

        $role = new Role();
        $role->id = uniqid();
        $role->name = "Responsable";
        $role->permission = "MANAGER";
        $role->save();

        $role = new Role();
        $role->id = uniqid();
        $role->name = "Rédacteur";
        $role->permission = "EDITOR";
        $role->save();

        $role = new Role();
        $role->id = uniqid();
        $role->name = "Lecteur";
        $role->permission = "READER";
        $role->save();
    }
}
