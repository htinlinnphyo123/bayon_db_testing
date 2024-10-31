<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $likes = (new MysqlScriptConverter('json_db/sc_likes.json'))->generate();
        foreach($likes as $like){
            DB::table('likes')->insert($like);
        }
    }
}
