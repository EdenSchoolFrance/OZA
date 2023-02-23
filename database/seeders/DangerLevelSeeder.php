<?php

namespace Database\Seeders;

use App\Models\DangerLevel;
use Illuminate\Database\Seeder;

class DangerLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $translate = [
            "H315" => 2,
            "H317" => 2,
            "H335" => 2,
            "H362" => 2,
            "EUH066" => 2,
            "EUH203" => 2,
            "EUH204" => 2,
            "EUH205" => 2,
            "H302" => 3,
            "H312" => 3,
            "H319" => 3,
            "H332" => 3,
            "H334" => 3,
            "H336" => 3,
            "H373" => 3,
            "H301" => 4,
            "H304" => 4,
            "H311" => 4,
            "H314" => 4,
            "H318" => 4,
            "H331" => 4,
            "H371" => 4,
            "H372" => 4,
            "EUH029" => 4,
            "EUH031" => 4,
            "EUH070" => 4,
            "EUH071" => 4,
            "EUH206" => 4,
            "EUH207" => 4,
            "H300" => 5,
            "H310" => 5,
            "H330" => 5,
            "H370" => 5,
            "EUH032" => 5,
            "H341" => 6,
            "H351" => 6,
            "H361" => 6,
            "CMR2" => 6,
            "H340" => 6,
            "H350" => 6,
            "H360" => 6,
            "H363" => 6,
            "CMR1A" => 6,
            "CMR1B" => 6
        ];

        foreach ($translate as $key => $item){
            $danger = new DangerLevel();
            $danger->id = uniqid();
            $danger->name = $key;
            $danger->value = $item;
            $danger->save();
        }
    }
}
