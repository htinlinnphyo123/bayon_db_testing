<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdvertiseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $advertises = (new MysqlScriptConverter('json_db/sb_advertise.json'))->generate();
        foreach($advertises as $advertise){
            DB::table('advertise')->insert($advertise);
        }
    }
}
