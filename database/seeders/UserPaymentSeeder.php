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
        $user_payments = (new MysqlScriptConverter('json_db/sb_userPayment.json'))->generate();
        foreach($user_payments as $user_payment){
            DB::table('user_payments')->insert($user_payment);
        }
    }
}
