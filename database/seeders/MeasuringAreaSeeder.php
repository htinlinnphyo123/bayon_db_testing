<?php

namespace Database\Seeders;

use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MeasuringAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $areas = (new MysqlScriptConverter('json_db/au_auto.json'))->generate();
        dd($areas);
    }
}
