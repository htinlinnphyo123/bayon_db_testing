<?php

use App\Livewire\Counter;
use App\Livewire\UserList;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MysqlScriptConverter;

Route::get('/', function () {
    // return view('welcome');
    $areas = (new MysqlScriptConverter('json_db/sb_plan.json'))->generate();
        dd($areas);
});

Route::get('test',function(){
    $check = password_verify('bayon@123$$','$2b$10$9FcwT3p3LLQ1.zcnV0/.7OLKvkjiPpTGS.XoZId23APeaT3LKZ2uS');
    dd($check);
});

Route::get('/counter', Counter::class)->name('counter');
Route::get('/users',UserList::class)->name('users.index');

Route::get('hello',[MysqlScriptConverter::class,'index']);
