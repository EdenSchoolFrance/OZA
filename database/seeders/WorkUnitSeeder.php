<?php

namespace Database\Seeders;

use App\Models\Activitie;
use App\Models\SectorActivitie;
use App\Models\WorkUnit;
use Illuminate\Database\Seeder;

class WorkUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $activities = Activitie::all();
        $sector = SectorActivitie::where('name','Administration publique')->first();
        $sector2 = SectorActivitie::where('name','Agriculture & forêts')->first();

        $work = new WorkUnit();
        $work->id = uniqid();
        $work->name = 'WorkUnit1';
        $work->sector_activitie()->associate($sector);
        $work->save();
        $work->activitie()->attach($activities[0]);

        $work = new WorkUnit();
        $work->id = uniqid();
        $work->name = 'WorkUnit2';
        $work->sector_activitie()->associate($sector);
        $work->save();
        $work->activitie()->attach($activities[0]);

        $work = new WorkUnit();
        $work->id = uniqid();
        $work->name = 'WorkUnit3';
        $work->sector_activitie()->associate($sector2);
        $work->save();
        $work->activitie()->attach($activities[1]);

        $work = new WorkUnit();
        $work->id = uniqid();
        $work->name = 'WorkUnit4';
        $work->sector_activitie()->associate($sector2);
        $work->save();
        $work->activitie()->attach($activities[1]);
    }
}
