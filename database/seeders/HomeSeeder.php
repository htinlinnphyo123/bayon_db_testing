<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $homes = (new MysqlScriptConverter('json_db/sb_home.json'))->generate();
        foreach($homes as $home){
            DB::table('home')->insert($home);
        }
    }
}
