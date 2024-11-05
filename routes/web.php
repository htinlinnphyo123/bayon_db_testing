<?php

use App\Interface\CarGenerateInterface;
use App\Livewire\Counter;
use App\Livewire\UserList;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MysqlScriptConverter;

Route::get('/', function () {
    // return view('welcome');
    ini_set('memory_limit', '512M'); // Increase memory limit here
    $areas = (new MysqlScriptConverter('json_db/users.json'))->generate();
    foreach($areas as &$a)
    {
        if(isset($a['emails']) && $a['emails']){
            $a['emails'] = json_decode($a['emails'],true);
        }  
        if(isset($a['ip_list']) && $a['ip_list']){
            $a['ip_list'] = json_decode($a['ip_list'],true);
        }
        if(isset($a['roles']) && $a['roles']){
            $a['roles'] = json_decode($a['roles'],true);
        }
        if($a['username']=='super'){
            dd($a);
        }
        
    }    
    dd($areas);
});

Route::get('test',function(){
    $check = password_verify('bayon@123$$','$2b$10$9FcwT3p3LLQ1.zcnV0/.7OLKvkjiPpTGS.XoZId23APeaT3LKZ2uS');
    dd($check);
});

Route::get('/counter', Counter::class)->name('counter');
Route::get('/users',UserList::class)->name('users.index');

Route::get('hello',[MysqlScriptConverter::class,'index']);

Route::get('test-container',function(){
   $color = 'green';
   $resolveContainerWithParam = app()->makeWith(CarGenerateInterface::class,['color'=>$color]);
    echo $resolveContainerWithParam->getInfo();
});