<?php

namespace Database\Seeders;

use App\Models\Doc;
use Illuminate\Database\Seeder;

class DocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doc = new Doc();
        $doc->id = uniqid();
        $doc->name = "documentations";
        $doc->title = "Documentations";
        $doc->content = "Doc Documentation";
        $doc->save();

        $doc = new Doc();
        $doc->id = uniqid();
        $doc->name = "regulatory_reminders";
        $doc->title = "Rappels réglementaires";
        $doc->content = "Doc Rappels réglementaires";
        $doc->save();
    }
}
