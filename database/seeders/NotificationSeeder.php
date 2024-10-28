<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $notifications = (new MysqlScriptConverter('json_db/sb_notification.json'))->generate();
        foreach($notifications as $notification){
            DB::table('notification')->insert($notification);
        }
    }
}
