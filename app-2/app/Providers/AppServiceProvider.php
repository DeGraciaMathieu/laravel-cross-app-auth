<?php

namespace App\Providers;

use App\Auth\CustomGuard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

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
        // Auth::extend('custom-driver', function ($app, $name, array $config) {
        //     return app(SessionGuard::class);
        //     // $provider = Auth::createUserProvider($config['provider']);
        //     // $request = $app->make('request');

        //     // return new CustomGuard($name, $provider, $app->make('session.store'), $request);
        // });

        Auth::extend('custom-driver', function ($app, $name, array $config) {
            return new CustomGuard(Auth::createUserProvider($config['provider']));
        });
    }
}
