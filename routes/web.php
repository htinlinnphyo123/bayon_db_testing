<?php

use App\Http\Controllers\MysqlScriptConverter;
use App\Livewire\Counter;
use App\Livewire\UserList;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    $areas = (new MysqlScriptConverter('json_db/web_newFeed.json'))->generate();
        dd($areas);
});

Route::get('/counter', Counter::class)->name('counter');
Route::get('/users',UserList::class)->name('users.index');

Route::get('hello',[MysqlScriptConverter::class,'index']);
