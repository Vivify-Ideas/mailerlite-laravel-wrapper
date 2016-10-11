<?php

namespace VivifyIdeas\MailerLite;

use Illuminate\Support\ServiceProvider;
use MailerLiteApi\MailerLite;

class MailerLiteServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/mailerlite.php' => config_path('mailerlite.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerMailerLite();
    }

    private function registerMailerLite()
    {
        $guzzle = new \GuzzleHttp\Client();
        $guzzleClient = new \Http\Adapter\Guzzle6\Client($guzzle);
        $this->app->bind('mailerlite', function($app) use ($guzzleClient) {
            return new MailerLite(
                config('mailerlite.api_key'), $guzzleClient
            );
        });
    }
}