<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AgencyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agencytypes = (new MysqlScriptConverter('json_db/ref_agencyType.json'))->generate();
        foreach($agencytypes as $agencytype){
            DB::table('agency_type')->insert($agencytype);
        }
    }
}
