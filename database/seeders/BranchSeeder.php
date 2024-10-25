<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branches = (new MysqlScriptConverter('json_db/branch.json'))->generate();
        foreach($branches as $branch){
            DB::table('branch')->insert($branch);
        }
    }
}
