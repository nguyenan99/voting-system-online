<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Model\Position;

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
        view()->composer('admin.layout.index',function ($view){
            $positi = Position::all();
            $view->with('positi',$positi);
        });
    }
}
