<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AppStoreTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $appstore_transactions = (new MysqlScriptConverter('json_db/appstore_transaction.json'))->generate();
        foreach ($appstore_transactions as $appstore_transaction) {
            DB::table('appstore_transaction')->insert($appstore_transaction);
        }
    }
}
