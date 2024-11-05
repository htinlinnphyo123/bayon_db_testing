<?php

namespace App\Providers;

use App\Interface\CarGenerateInterface;
use App\Producer\BmwGenerator;
use App\Producer\MarcedeGenerator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $car = env('CAR_BRAND','BMW');

        if($car=='BMW'){
            $this->app->bind(CarGenerateInterface::class,function(){
                return new BmwGenerator('red');
            });
        }else{
            $this->app->bind(CarGenerateInterface::class,function(){
                return new MarcedeGenerator('red');
            });   
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
