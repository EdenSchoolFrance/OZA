<?php

namespace Database\Seeders;

use App\Models\Danger;
use App\Models\Reflection;
use Illuminate\Database\Seeder;

class ReflectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $danger = Danger::where('name', 'Accident')->first();

        $reflection = new Reflection();
        $reflection->id = uniqid();
        $reflection->name = 'Y-a-t-il des SST';
        $reflection->danger()->associate($danger);
        $reflection->save();

        $reflection = new Reflection();
        $reflection->id = uniqid();
        $reflection->name = 'Y-a-t-il une trousse de secours à disposition';
        $reflection->danger()->associate($danger);
        $reflection->save();
        
        $reflection = new Reflection();
        $reflection->id = uniqid();
        $reflection->name = 'Combien';
        $reflection->danger()->associate($danger);
        $reflection->save();
    }
}
