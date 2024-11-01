<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WebImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $web_images = (new MysqlScriptConverter('json_db/web_images.json'))->generate();
        foreach($web_images as $web_image){
            DB::table('web_images')->insert($web_image);
        }
    }
}
