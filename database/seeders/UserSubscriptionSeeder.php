<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_subscriptions = (new MysqlScriptConverter('json_db/sb_userSubscription.json'))->generate();
        foreach($user_subscriptions as $user_subscription){
            DB::table('user_subscriptions')->insert($user_subscription);
        }
    }
}
