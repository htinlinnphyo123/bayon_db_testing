<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PurposeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $purposes = (new MysqlScriptConverter('json_db/sb_purpose.json'))->generate();
        foreach($purposes as $purpose){
            DB::table('purposes')->insert($purpose);
        }
    }
}
