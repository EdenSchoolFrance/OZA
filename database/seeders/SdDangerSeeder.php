<?php

namespace Database\Seeders;

use App\Models\Danger;
use App\Models\SdDanger;
use App\Models\SingleDocument;
use Illuminate\Database\Seeder;

class SdDangerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $single_document = SingleDocument::where('name', 'Siege')->first();
        $dangers = Danger::all();

        foreach ($dangers as $danger) {
            $sdDanger = new SdDanger();
            $sdDanger->id = uniqid();
            $sdDanger->single_document()->associate($single_document);
            $sdDanger->danger()->associate($danger);
            $sdDanger->save();
        }
    }
}
