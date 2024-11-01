<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PropertyValuateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $property_valuates = (new MysqlScriptConverter('json_db/sb_propertyValuate.json'))->generate();
        foreach($property_valuates as $property_valuate){
            DB::table('property_valuates')->insert($property_valuate);
        }
    }
}
