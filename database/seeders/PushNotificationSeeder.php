<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PushNotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $push_notifications = (new MysqlScriptConverter('json_db/sb_pushNotification.json'))->generate();
        foreach($push_notifications as $push_notification){
            DB::table('push_notifications')->insert($push_notification);
        }
    }
}
