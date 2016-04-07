<?php

namespace App\Provider;

use Johndodev\Provider\AbstractProvider;
use Pimple\Container;

class TwigProvider extends AbstractProvider
{
    public function register(Container $container)
    {
        // extend twig
        $container->extend('twig', function($twig, $app) {
            // $twig->addExtension(...); TODO from config ?
            return $twig;
        });
    }
}
