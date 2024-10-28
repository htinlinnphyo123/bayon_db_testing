<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PropertyUserFavSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $property_user_favs = (new MysqlScriptConverter('json_db/sb_favorite.json'))->generate();
        foreach($property_user_favs as $property_user_fav){
            DB::table('property_user_fav')->insert($property_user_fav);
        }
    }
}
