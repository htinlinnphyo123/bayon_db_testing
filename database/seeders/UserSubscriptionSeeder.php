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
        ini_set('memory_limit','512M');
        $user_subscriptions = (new MysqlScriptConverter('json_db/sb_userSubscription.json'))->limit(1000);;
        foreach($user_subscriptions as $user_subscription){
            DB::table('user_subscriptions')->insert($user_subscription);
        }
        $this->command->info('Inserted to Properties Successfully . Limited to only generate 1000 cuz memory size limit.');
    }
}
