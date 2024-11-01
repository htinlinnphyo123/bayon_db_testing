<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TwoCTwoPTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $twoc_twop_transactions = (new MysqlScriptConverter('json_db/twoCtwoP_transaction.json'))->generate();
        foreach($twoc_twop_transactions as $twoc_twop_transaction){
            DB::table('twoc_twop_transactions')->insert($twoc_twop_transaction);
        }
    }
}
