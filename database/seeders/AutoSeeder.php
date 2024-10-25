<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $autos = (new MysqlScriptConverter('json_db/au_auto.json'))->generate();
        foreach($autos as $auto){
            DB::table('auto')->insert($auto);
        }
    }
}
