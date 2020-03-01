<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MapBoxServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('http.maps-api', function () {
            $config = [
                'base_uri' => config('maps-api.connections.mapbox.url'),
                'auth' => [
                ],
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json'
                ]
            ];

            return app('http')->config($config);
        });
    }
}
