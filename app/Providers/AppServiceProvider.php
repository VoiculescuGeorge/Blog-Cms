<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Categorie;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer('layouts.app', function($view){
            $view->with('html',
                Categorie::route(['category' => 'slug'])->renderAsHtml());
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
