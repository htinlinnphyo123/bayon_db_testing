<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WantedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wanteds = (new MysqlScriptConverter('json_db/sb_wanted.json'))->generate();
        foreach($wanteds as $wanted){
            DB::table('wanteds')->insert($wanted);
        }
    }
}
