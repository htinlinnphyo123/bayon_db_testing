<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ini_set('memory_limit', '512M');
        $user_actions = (new MysqlScriptConverter('json_db/userActions.json'))->limit(100);
        foreach($user_actions as $user_action){
            if(isset($user_action['is_property']) && $user_action['is_property']!==null){
                $user_action['is_property'] = 1;
            }else{
                $user_action['is_property'] = 0;
            }
            DB::table('user_actions')->insert($user_action);
        }
        $this->command->info('Inserted to user_actions Successfully');

    }
}
