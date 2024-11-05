<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ini_set('memory_limit','512M');
        $users = (new MysqlScriptConverter('json_db/users.json'))->generate();
        foreach($users as $user){
            if(isset($user['services']['facebook']) && $user['services']['facebook']){
                $user['facebook_access_token'] = $user['services']['facebook']['accessToken'];
                $user['facebook_email'] = $user['services']['facebook']['email'];
            }
            if(isset($user['services']['password']) && $user['services']['password']){
                $user['password'] = $user['services']['password']['bcrypt'];
            }
            if(isset($user['emails']))
            DB::table('users')->insert($user);
        }
    }
}
