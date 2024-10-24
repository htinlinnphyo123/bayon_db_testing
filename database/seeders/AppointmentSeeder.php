<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $appointments = (new MysqlScriptConverter('json_db/sb_appointment.json'))->generate();
        foreach($appointments as $appointment){
            DB::table('appointment')->insert($appointment);
        }
    }
}
