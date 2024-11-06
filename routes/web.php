<?php

use App\Livewire\Counter;
use App\Livewire\UserList;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MysqlScriptConverter;

Route::get('/', function () {
    ini_set('memory_limit','512M');
    $areas = (new MysqlScriptConverter('json_db/users.json'))->limit(3);
        dd($areas);
});

Route::get('test-pw',function(){
    $check = password_verify('bayon@123$$','$2b$10$9FcwT3p3LLQ1.zcnV0/.7OLKvkjiPpTGS.XoZId23APeaT3LKZ2uS');
    dd($check);
});

Route::get('/counter', Counter::class)->name('counter');
Route::get('/users',UserList::class)->name('users.index');

Route::get('hello',[MysqlScriptConverter::class,'index']);
