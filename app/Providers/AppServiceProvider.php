<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->locales(['ar','en','fr', 'es'])
                ->visible(outsidePanels: true)
                ->outsidePanelRoutes([
                    'profile',
                    'home',
                    // Additional custom routes where the switcher should be visible outside panels
                ])
                ->renderHook('panels::global-search.before'); // also accepts a closure
                //->flags([
                    //'ar' => asset('flags/saudi-arabia.svg'),
                    //'fr' => asset('flags/france.svg'),
                    //'en' => asset('flags/usa.svg'),
                //]);  
        });
    }
}
