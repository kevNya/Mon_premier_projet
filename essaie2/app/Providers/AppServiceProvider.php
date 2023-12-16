<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;


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
        //
        Validator::extend('time', function ($attribute, $value, $parameters, $validator) {
            // Vérifie si la valeur est au format heure valide (HH:mm)
            return preg_match('/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/', $value);
        });

    }
}
