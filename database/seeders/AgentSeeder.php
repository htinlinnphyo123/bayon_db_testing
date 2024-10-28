<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agents = (new MysqlScriptConverter('json_db/sb_agent.json'))->generate();
        foreach($agents as $agent){
            if(isset($agent['is_renew']) && $agent['is_renew']=='Renew'){
                $agent['is_renew'] = 1;
            }
            DB::table('agent')->insert($agent);
        }
    }
}
