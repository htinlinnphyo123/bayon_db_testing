<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AssociationSeeder::class,
            AbaTransactionSeeder::class,
            AppStoreTransactionSeeder::class,
            AutoSeeder::class,
            AutoBranchSeeder::class,
            AutoSubBranchSeeder::class,
            BranchSeeder::class,
            CompanySeeder::class,
            AgencyTypeSeeder::class,
            // DistrictSeeder::class,
            LocationSeeder::class,
            PropertyTypeSeeder::class,
            AdvertiseSeeder::class,
            // AgentSeeder::class,
            AgentGroupSeeder::class,
            AgentMemberGroupSeeder::class,
            AnnouncementSeeder::class,
            ApplyLoanSeeder::class,
            AppointmentSeeder::class,


        ]);
        // User::factory(10)->create();

        // User::factory(10)->create();
    }
}
