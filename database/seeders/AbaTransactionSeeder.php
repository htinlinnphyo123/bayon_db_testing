<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AbaTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $aba_transactions = (new MysqlScriptConverter('json_db/aba_transaction.json'))->generate();
        foreach($aba_transactions as $aba_transaction){
            DB::table('aba_transactions')->insert($aba_transaction);
        }
        $this->command->info('Inserted to aba_transactions Successfully');

    }
}
