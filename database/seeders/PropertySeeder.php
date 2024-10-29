<?php

namespace Database\Seeders;

use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $properties = (new MysqlScriptConverter('json_db/sb_property.json'))->generate();
        foreach($properties as $property){
            DB::table('properties')->insert($property);
        }
    }
}
