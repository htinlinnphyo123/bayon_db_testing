<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BusinessTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $business_types = (new MysqlScriptConverter('json_db/sb_businessType.json'))->generate();
        foreach($business_types as $business_type){
            DB::table('business_type')->insert($business_type);
        }
    }
}
