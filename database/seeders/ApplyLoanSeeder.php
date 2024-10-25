<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ApplyLoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $apply_loans = (new MysqlScriptConverter('json_db/sb_applyLoan.json'))->generate();
        foreach($apply_loans as $apply_loan){
            DB::table('apply_loan')->insert($apply_loan);
        }
    }
}
