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
        ini_set('memory_limit', '512M'); // Increase memory limit here

        $properties = (new MysqlScriptConverter('json_db/sb_property.json'))->limit(1000);
        foreach($properties as $property){
            DB::table('properties')->insert($property);
        }
        $this->command->info('Inserted to Properties Successfully . Limited to only generate 1000 cuz memory size limit.');

    }
}
