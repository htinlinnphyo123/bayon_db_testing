<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AgentGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agent_groups = (new MysqlScriptConverter('json_db/sb_agentGroup.json'))->generate();
        foreach($agent_groups as $agent_group){
            DB::table('agent_group')->insert($agent_group);
        }
    }
}
