<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $property_types = (new MysqlScriptConverter('json_db/ref_propertyType.json'))->generate();
        foreach($property_types as $property_type){
            DB::table('property_type')->insert($property_type);
        }
    }
}
