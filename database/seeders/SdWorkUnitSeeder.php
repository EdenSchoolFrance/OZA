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
        $sd = SingleDocument::where('name','Siege')->first();

        $work = new SdWorkUnit();
        $work->id = uniqid();
        $work->name = 'test';
        $work->number_employee = 3;
        $work->single_document()->associate($sd);
        $work->validated = 1;
        $work->save();
    }
}
