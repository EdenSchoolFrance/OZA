<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Client;
use App\Models\Danger;
use App\Models\SingleDocument;
use Illuminate\Database\Seeder;

class SingleDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = Client::where('name', 'Biocoop')->first();
        $admin = User::where('email', 'adminclient@gmail.com')->first();
        $manager = User::where('email', 'managerclient@gmail.com')->first();
        $editor = User::where('email', 'editorclient@gmail.com')->first();
        $reader = User::where('email', 'readerclient@gmail.com')->first();

        $sd = new SingleDocument();
        $sd->id = uniqid();
        $sd->name = "Siege";
        $sd->name_enterprise = "Biocoop";
        $sd->adress = "12 rue du louvre";
        $sd->city_zipcode = "75000";
        $sd->city = "Paris";
        $sd->sector = "Secteur";
        $sd->activity_description = "Description de l'activité";
        $sd->premise_description = "Description des locaux";
        $sd->firstname = "Jhon";
        $sd->lastname = "Doe";
        $sd->email = "jhon.doe@bicoop.fr";
        $sd->phone = "0614875412";
        $sd->function = "Responsable DU";
        $sd->work_unit_limit = 30;
        $sd->client()->associate($client);
        $sd->save();
        $sd->users()->attach($admin);
        $sd->users()->attach($manager);
        $sd->users()->attach($editor);
        $sd->users()->attach($reader);
    }
}
