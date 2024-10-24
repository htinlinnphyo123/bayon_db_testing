<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $announcements = (new MysqlScriptConverter('json_db/sb_announcement.json'))->generate();
        foreach($announcements as $announcement){
            DB::table('announcement')->insert($announcement);
        }
    }
}
