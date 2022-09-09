<?php

namespace Database\Seeders;

use App\Models\SdActivitie;
use App\Models\SdItem;
use App\Models\SdWorkUnit;
use App\Models\SingleDocument;
use Illuminate\Database\Seeder;

class SdWorkUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            "Métier n°1",
            "Métier n°2",
            "Métier n°3",
            "Métier n°4",
            "Métier n°5",
            "Métier n°6",
            "Métier n°7",
            "Métier n°8",
            "Métier n°9",
            "Métier n°10",
            "Métier n°11",
            "Métier n°12",
            "Métier n°13",
            "Métier n°14",
            "Métier n°15",
            "Métier n°16",
            "Métier n°17",
            "Métier n°18",
            "Métier n°19",
            "Métier n°20",
            "Métier n°21",
            "Métier n°22",
            "Métier n°23",
            "Métier n°24",
            "Métier n°25",
            "Métier n°26",
            "Métier n°27",
            "Métier n°28",
            "Métier n°29",
            "Métier n°30",
            "Métier n°31",
            "Métier n°32",
            "Métier n°33",
            "Métier n°34",
            "Métier n°35",
            "Métier n°36",
            "Métier n°37",
            "Métier n°38",
            "Métier n°39",
            "Métier n°40",
        ];

        $sd = SingleDocument::where('name','Siege')->first();
        $sd2 = SingleDocument::where('name','Import')->first();

        $work = new SdWorkUnit();
        $work->id = uniqid();
        $work->name = 'test';
        $work->number_employee = 3;
        $work->single_document()->associate($sd);
        $work->validated = 1;
        $work->save();


        for ($i = 0; $i < count($data); $i++){
            $work = new SdWorkUnit();
            $work->id = uniqid();
            $work->name = $data[$i];
            $work->number_employee = 3;
            $work->single_document()->associate($sd2);
            $work->validated = 1;
            $work->save();
        }
    }
}
