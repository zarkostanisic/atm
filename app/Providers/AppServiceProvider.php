<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Validator::extend('amount', function ($attribute, $value, $parameters, $validator) {
            $denominations = array(200, 500, 1000, 2000, 5000);

            foreach($denominations as $d){
                if($value % $d === 0) return true;
            }

            return false;
        });
    }
}
