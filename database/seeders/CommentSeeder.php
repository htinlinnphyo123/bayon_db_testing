<?php

namespace Database\Seeders;

use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comments = (new MysqlScriptConverter('json_db/sc_comments.json'))->generate();
        foreach($comments as $comment){
            DB::table('comments')->insert($comment);
        }
    }
}
