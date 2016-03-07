<?php

namespace Mooc\Provider;

use Johndodev\Provider\AbstractProvider;
use Monolog\Logger;
use Pimple\Container;

class MonologProvider extends AbstractProvider
{
    public function register(Container $container)
    {
        $container['monolog.logfile']   = __DIR__.'/../logs/'.$container['env'].'.log';
        $container['monolog.name']      = 'mooc-'.$container['env'];

        $container->extend('monolog', function(Logger $monolog, Container $container) {
            // add sentry TODO

//            $ravenClient = new \Raven_Client('https://06e6120292f345429b503f67bd14dda7:38747b749c054f82aba3f342d75289c5@app.getsentry.com/46290');
//            $monolog->pushHandler(new RavenHandler($ravenClient, Logger::WARNING));

            return $monolog;
        });
    }
}
