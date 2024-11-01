<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_documents = (new MysqlScriptConverter('json_db/sb_userDocument.json'))->generate();
        foreach($user_documents as $user_document){
            DB::table('user_documents')->insert($user_document);
        }
    }
}
