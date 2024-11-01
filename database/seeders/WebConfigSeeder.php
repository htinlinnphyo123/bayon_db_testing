<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WebConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $web_configs = (new MysqlScriptConverter('json_db/web_config.json'))->generate();
        foreach($web_configs as $web_config){
            DB::table('web_configs')->insert($web_config);
        }
    }
}
