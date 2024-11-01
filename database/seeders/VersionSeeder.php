<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VersionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $versions = (new MysqlScriptConverter('json_db/sb_version.json'))->generate();
        foreach($versions as $version){
            DB::table('versions')->insert($version);
        }
    }
}
