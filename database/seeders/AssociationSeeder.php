<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AssociationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run():void
    {
        $associations = (new MysqlScriptConverter('json_db/au_auto.json'))->generate();
        foreach($associations as $association){
            DB::table('auto')->insert($association);
        }

    }
}
