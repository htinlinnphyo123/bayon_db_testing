<?php

namespace Database\Seeders;

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
            ClientSeeder::class,
            CommentSeeder::class,
            CompanySeeder::class,
            DistrictSeeder::class,
            FollowSeeder::class,
            HomeSeeder::class,
            LikeSeeder::class,
            LocationSeeder::class,
            MeasuringAreaSeeder::class,
            NotificationSeeder::class,
            PlanSeeder::class,
            PostSeeder::class,
            ProjectSeeder::class,
            PropertyTypeSeeder::class,
            PropertySeeder::class,
            PropertyUserFavSeeder::class,
            ReportSeeder::class,
            TwoCTwoPTransactionSeeder::class,
            UserActionSeeder::class,
            UserSeeder::class,
            VideoSeeder::class,
            WantedSeeder::class,
            UserDocumentsSeeder::class,
        ]);
    }
}
