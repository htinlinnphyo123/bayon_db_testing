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
        $user_actions = (new MysqlScriptConverter('json_db/userActions.json'))->generate();
        foreach($user_actions as $user_action){
            DB::table('user_actions')->insert($user_action);
        }
    }
}
