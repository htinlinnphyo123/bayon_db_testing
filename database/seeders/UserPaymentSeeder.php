<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ini_set('memory_limit', '512M'); // Increase memory limit here
        $user_payments = (new MysqlScriptConverter('json_db/sb_userPayment.json'))->limit(1000);
        foreach($user_payments as $user_payment){
            DB::table('user_payments')->insert($user_payment);
        }
        $this->command->info('Inserted to Properties Successfully . Limited to only generate 1000 cuz memory size limit.');
    }
}
