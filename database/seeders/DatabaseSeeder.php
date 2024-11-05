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
            AudioSeeder::class,
            AutoSeeder::class,
            AutoBranchSeeder::class,
            AutoSubBranchSeeder::class,
            BranchSeeder::class,
            BusinessTypeSeeder::class,
            CategorySeeder::class,
            ClientSeeder::class,
            CommentSeeder::class,
            CompanySeeder::class,
            CompensationSeeder::class,
            ConfigSeeder::class,
            CounterSeeder::class,
            DistrictSeeder::class,
            ExchangeSeeder::class,
            FollowSeeder::class,
            HomeSeeder::class,
            LikeSeeder::class,
            LocationSeeder::class,
            MeasuringAreaSeeder::class,
            NotificationSeeder::class,
            PostSeeder::class,
            ProjectSeeder::class,
            PropertySeeder::class,
            PropertyTypeSeeder::class,
            PropertyUserFavSeeder::class,
            PropertyValuateSeeder::class,
            PurposeSeeder::class,
            PushNotificationSeeder::class,
            ReportSeeder::class,
            RoleSeeder::class,
            StateSeeder::class,
            TwoCTwoPTransactionSeeder::class,
            TwoCTwoPTransactionSeeder::class,
            UnitSeeder::class,
            UserActionSeeder::class,
            UserDocumentSeeder::class,
            UserPaymentSeeder::class,
            UserSubscriptionSeeder::class,
            // UserSeeder::class,
            VersionSeeder::class,
            VideoSeeder::class,
            WantedSeeder::class,
            WebConfigSeeder::class,
            WebImageSeeder::class,
            LoginServiceConfigurationSeeder::class,
            PendingCredentialSeeder::class,
            PlanSeeder::class,


        ]);
        // User::factory(10)->create();

        // User::factory(10)->create();
    }
}
