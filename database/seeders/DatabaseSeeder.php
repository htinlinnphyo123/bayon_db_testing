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
            AbaTransactionSeeder::class,
            AdvertiseSeeder::class,
            AgencyTypeSeeder::class,
            AgentGroupSeeder::class,
            AgentMemberGroupSeeder::class,
            AgentSeeder::class,
            AnnouncementSeeder::class,
            ApplyLoanSeeder::class,
            AppointmentSeeder::class,
            AppStoreTransactionSeeder::class,
            AssociationSeeder::class,
            AutoBranchSeeder::class,
            AutoSeeder::class,
            AutoSubBranchSeeder::class,
            BranchSeeder::class,
            BusinessTypeSeeder::class,
            CategorySeeder::class,
            DistrictSeeder::class,
            HomeSeeder::class,
            LocationSeeder::class,
            MeasuringAreaSeeder::class,
            NotificationSeeder::class,
            PropertyTypeSeeder::class,
            PropertyUserFavSeeder::class
            // JobSeeder::class

        ]);
        // User::factory(10)->create();

        // User::factory(10)->create();
    }
}
