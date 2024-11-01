<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompensationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $compensations = (new MysqlScriptConverter('json_db/sb_compensation.json'))->generate();
        foreach($compensations as $compensation){
            DB::table('compensations')->insert($compensation);
        }
    }
}
