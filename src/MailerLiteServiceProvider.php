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
        $this->app->bind('mailerlite', function($app) {
            return new MailerLite(
                config('mailerlite.api_key')
            );
        });
    }
}