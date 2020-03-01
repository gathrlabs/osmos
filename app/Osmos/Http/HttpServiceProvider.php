<?php
/**
 * Created by PhpStorm.
 * User: tomscerri
 * Date: 23/12/18
 * Time: 9:10 PM
 */

namespace App\Osmos\Http;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class HttpServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('http', function() {
            // Return a new Http class and inject the Guzzle client.
            return new Http(new Client);
        });
    }
}
