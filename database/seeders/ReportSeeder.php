<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reports = (new MysqlScriptConverter('json_db/sc_reports.json'))->generate();
        foreach($reports as $report){
            DB::table('reports')->insert($report);
        }
    }
}
