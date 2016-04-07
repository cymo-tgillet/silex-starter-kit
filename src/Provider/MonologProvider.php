<?php

namespace App\Provider;

use Johndodev\Provider\AbstractProvider;
use Monolog\Logger;
use Pimple\Container;

class MonologProvider extends AbstractProvider
{
    public function register(Container $container)
    {
        $container->extend('monolog', function(Logger $monolog, Container $container) {
            // add sentry TODO suivant config ?
            return $monolog;
        });
    }
}
