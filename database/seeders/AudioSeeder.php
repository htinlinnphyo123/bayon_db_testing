<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $audios = (new MysqlScriptConverter('json_db/sc_audios.json'))->generate();
        foreach($audios as $audio){
            DB::table('audios')->insert($audio);
        }
    }
}
