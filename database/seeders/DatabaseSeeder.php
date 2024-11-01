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
            // AgentGroupSeeder::class,
            AgentMemberGroupSeeder::class,
            AnnouncementSeeder::class,
            ApplyLoanSeeder::class,
            AppointmentSeeder::class,
            // PropertySeeder::class,
            CommentSeeder::class,
            ProjectSeeder::class,
            AudioSeeder::class,
            FollowSeeder::class,
            LikeSeeder::class,
            PostSeeder::class,
            ReportSeeder::class,
            VideoSeeder::class,
            WantedSeeder::class,
            TwoCTwoPTransactionSeeder::class,
            // UserActionSeeder::class,
            // UserSeeder::class,
            ExchangeSeeder::class,
            RoleSeeder::class,
            StateSeeder::class,
            UnitSeeder::class,
            LoginServiceConfigurationSeeder::class,
            PendingCredentialSeeder::class,
            CompensationSeeder::class,
            ConfigSeeder::class,
            CounterSeeder::class,
            PlanSeeder::class,
            PropertyValuateSeeder::class,
            PurposeSeeder::class,
            PushNotificationSeeder::class,
            UserDocumentSeeder::class,
            // UserPaymentSeeder::class,
            VersionSeeder::class,
            WebConfigSeeder::class,
            WebImageSeeder::class,


        ]);
        // User::factory(10)->create();

        // User::factory(10)->create();
    }
}
