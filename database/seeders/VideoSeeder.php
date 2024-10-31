<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $videos = (new MysqlScriptConverter('json_db/sc_videos.json'))->generate();
        foreach($videos as $video){
            DB::table('videos')->insert($video);
        }
    }
}
