<?php

namespace Database\Seeders;

use App\Models\DomainActivitie;
use App\Models\Item;
use App\Models\SubItem;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);

        $this->call(UserSeeder::class);

        $this->call(ClientSeeder::class);

        $this->call(UpdateUserSeeder::class);

        $this->call(PackSeeder::class);

        $this->call(SectorActivitieSeeder::class);

        $this->call(ActivitieSeeder::class);

        $this->call(WorkUnitSeeder::class);

        $this->call(DangerSeeder::class);
        
        $this->call(ReflectionSeeder::class);

        $this->call(SingleDocumentSeeder::class);

        $this->call(SdDangerSeeder::class);

        $this->call(DocSeeder::class);

        $this->call(SdWorkUnitSeeder::class);

        $this->call(SdActivitieSeeder::class);

        $this->call(ItemSeeder::class);

        $this->call(SubItemSeeder::class);

        $this->call(ChildSubItemSeeder::class);

        $this->call(SdItemSeeder::class);

        $this->call(DomainActivitieSeeder::class);

        $this->call(RiskSeeder::class);

        $this->call(RestraintSeeder::class);

        $this->call(ExpositionSeeder::class);
        
        $this->call(ExpositionGroupSeeder::class);
        
        $this->call(ExpositionQuestionSeeder::class);

        $this->call(RiskCalculationSeeder::class);
    }
}
