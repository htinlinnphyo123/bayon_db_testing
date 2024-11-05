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
            $this->app->bind(CarGenerateInterface::class,function($app,$params){
                return new BmwGenerator($params['color']);
            });
        }else{
            $this->app->bind(CarGenerateInterface::class,function($app,$params){
                return new MarcedeGenerator($params['color']);
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
