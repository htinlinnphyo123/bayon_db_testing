<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LoginServiceConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $account_login_service_configurations = (new MysqlScriptConverter('json_db/meteor_accounts_loginServiceConfiguration.json'))->generate();
        foreach($account_login_service_configurations as $account_login_service_configuration){
            DB::table('account_login_service_configurations')->insert($account_login_service_configuration);
        }
    }
}
