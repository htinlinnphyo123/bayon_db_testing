<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $districties = (new MysqlScriptConverter('json_db/ref_district.json'))->generate();
        foreach($districties as $district){
            DB::table('district')->insert($district);
        }
    }
}
