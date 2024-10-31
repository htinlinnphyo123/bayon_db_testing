<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FollowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $follows = (new MysqlScriptConverter('json_db/sc_follows.json'))->generate();
        foreach($follows as $follow){
            DB::table('follows')->insert($follow);
        }
    }
}
