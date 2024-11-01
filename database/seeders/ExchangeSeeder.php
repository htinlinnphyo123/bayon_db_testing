<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExchangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $exchanges = (new MysqlScriptConverter('json_db/exchange.json'))->generate();
        foreach($exchanges as $exchange){
            DB::table('exchanges')->insert($exchange);
        }
    }
}
