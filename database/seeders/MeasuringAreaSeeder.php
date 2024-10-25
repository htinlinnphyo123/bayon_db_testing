<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MeasuringAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $measuring_areas = (new MysqlScriptConverter('json_db/sb_measuringArea.json'))->generate();
        foreach($measuring_areas as $measuring_area){
            DB::table('measuring_area')->insert($measuring_area);
        }
    }
}
