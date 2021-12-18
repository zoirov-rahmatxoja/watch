<?php

namespace App\Providers;

use App\View\Components\LocaleComposer;
use App\View\Components\SettingsComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;



class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        {
            View::composer('*', LocaleComposer::class);
            
        }
    }
}
