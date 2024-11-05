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
            $commission = [];
            if($agent_group['commission']){
                $commission = json_decode($agent_group['commission'],true);
            }
            unset($agent_group['commission']);
            DB::table('agent_group')->insert($agent_group);
            $formatCommission = $this->formatCommission($commission,$agent_group['id']);
            DB::table('agent_group_commission')->insert($formatCommission);
        }
    }
    protected function formatCommission($array,$agentGroupID) {
        foreach ($array as &$item) {
            foreach ($item as $key => $value) {
                $item['agent_group_id'] = $agentGroupID;
                if($key==='propertyType'){
                    $item['property_type'] = $value;
                    unset($item['propertyType']);
                }
                if($key==='fee'){
                    $fees = $item['fee'];
                    foreach($fees as $fKey=>$fValue){
                        foreach($fValue as $nKey=>$nValue){
                            $testKey = $this->camelToSnakeCase($fKey);
                            $item[$testKey] = $nValue;
                        }
                    }
                    unset($item['fee']);
                }
            }
        }
        return $array;
    }
    protected function camelToSnakeCase($camelCase) { 
        $result = ''; 
        for ($i = 0; $i < strlen($camelCase); $i++) { 
            $char = $camelCase[$i]; 
    
            if (ctype_upper($char)) { 
                $result .= '_' . strtolower($char); 
            } else { 
                $result .= $char; 
            } 
        } 
    
        return ltrim($result, '_'); 
    }
    
}
