<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $districties = (new MysqlScriptConverter('json_db/ref_district.json'))->limit(1000);
        foreach($districties as $district){
            DB::table('districts')->insert($district);
        }
        $this->command->info('Inserted to Districts Table Successfully . Limited to only generate 1000 cuz memory size limit.');

    }
}
