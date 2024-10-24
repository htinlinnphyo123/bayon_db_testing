<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AgentMemberGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agent_member_groups = (new MysqlScriptConverter('json_db/sb_agentMemberGroup.json'))->generate();
        foreach($agent_member_groups as $agent_member_group){
            DB::table('agent_member_group')->insert($agent_member_group);
        }
    }
}
