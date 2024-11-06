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
            if(isset($user['services'])){
                unset($user['services']);
            }
            if(isset($user['emails'][0])){
                $user['email'] = $user['emails'][0]['address'];
                $user['email_verified'] = $user['emails'][0]['verified'] ? 1 : 0;
                unset($user['emails']);
            }
            if(isset($user['profile'])){
                $profile = $user['profile'];
                $user['full_name'] = $profile['fullName'];
                $user['approved'] = $profile['approved'] ? 1 : 0;
                $user['is_owner'] = $profile['owner'] ? 1 : 0;
                $user['status'] = $profile['status'] ?? null;
                unset($user['profile']);
            }
            dd($user);
            DB::table('users')->insert($user);
        }
    }
}
