<?php

namespace VivifyIdeas\MailerLite\Facades;

use Illuminate\Support\Facades\Facade;

class MailerLite extends Facade
{

    protected static function getFacadeAccessor()
    {
        return static::$app['mailerlite'];
    }

}