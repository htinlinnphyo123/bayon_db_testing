<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AutoBranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $auto_branchs = (new MysqlScriptConverter('json_db/au_autoBranch.json'))->generate();
        foreach($auto_branchs as $auto_branch){
            DB::table('auto_branch')->insert($auto_branch);
        }
    }
}
