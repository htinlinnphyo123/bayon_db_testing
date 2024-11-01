<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CounterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $counters = (new MysqlScriptConverter('json_db/sb_counter.json'))->generate();
        foreach($counters as $counter){
            DB::table('counters')->insert($counter);
        }
    }
}
