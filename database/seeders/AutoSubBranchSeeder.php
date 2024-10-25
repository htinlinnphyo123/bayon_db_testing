<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AutoSubBranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $auto_sub_branches = (new MysqlScriptConverter('json_db/au_autoSubBranch.json'))->generate();
        foreach($auto_sub_branches as $auto_sub_branch){
            DB::table('auto_sub_branch')->insert($auto_sub_branch);
        }
    }
}
