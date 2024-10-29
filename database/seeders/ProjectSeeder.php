<?php

namespace Database\Seeders;

use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = (new MysqlScriptConverter('json_db/sb_project.json'))->generate();
        foreach($projects as $project){
            DB::table('projects')->insert($project);
        }
    }
}
