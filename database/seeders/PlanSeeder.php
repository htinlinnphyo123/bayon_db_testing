<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = (new MysqlScriptConverter('json_db/sb_plan.json'))->generate();
        foreach($plans as $plan){
            $planDetail = []; //for plan_detail table creation
            if($plan['plan_country']){
                $planDetail = json_decode($plan['plan_country'],true);                
            }
            unset($plan['plan_country']);
            DB::table('plans')->insert($plan);
            $formatDetails = $this->formatDetails($planDetail,$plan['id']);
            foreach($formatDetails as $detail){
                DB::table('plan_details')->insert($detail);
            }
        }
    }
    protected function formatDetails($array,$planID) {
        foreach ($array as &$item) {
            foreach ($item as $key => $value) {
                $item['plan_id'] = $planID;
                $newKey = $this->camelToSnakeCase($key);
                // Check if it's an object with "$numberInt" or "$numberDouble" key
                if(isset($value['$numberInt'])){
                    $item[$newKey] = (int)$value['$numberInt'];
                } elseif(isset($value['$numberDouble'])){
                    $item[$newKey] = (float)$value['$numberDouble'];
                } else {
                    $item[$newKey] = $value;
                }
                if($newKey!==$key){
                    unset($item[$key]);
                }
            }
        }
        return $array;
    }
    public function camelToSnakeCase($camelCase) { 
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
