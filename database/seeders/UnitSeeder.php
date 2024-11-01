<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = (new MysqlScriptConverter('json_db/sb_unit.json'))->generate();
        foreach($units as $unit){
            DB::table('units')->insert($unit);
        }
    }
}
