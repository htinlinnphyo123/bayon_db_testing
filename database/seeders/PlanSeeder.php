<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = (new MysqlScriptConverter('json_db/sb_plan.json'))->generate();
        foreach($plans as $plan){
            DB::table('plans')->insert($plan);
        }
    }
}
