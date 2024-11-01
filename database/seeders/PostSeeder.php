<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = (new MysqlScriptConverter('json_db/sc_posts.json'))->generate();
        foreach($posts as $post){
            DB::table('posts')->insert($post);
        }
    }
}
