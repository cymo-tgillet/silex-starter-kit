<?php

namespace Mooc\Provider;

use Johndodev\Provider\AbstractProvider;
use Pimple\Container;

class TwigProvider extends AbstractProvider
{
    public function register(Container $container)
    {
        $container['twig.path'] = array_merge($container['twig.path'], [
            __DIR__.'/../View',
            __DIR__.'/../../vendor/symfony/twig-bridge/Resources/views/Form',
        ]);

        $container['twig.options'] = [
            'debug' => $container['debug'],
            'cache' => __DIR__.'/../cache/twig',
            'strict_variables' => true,
        ];

        // 'twig.form.templates' => ['Form/default.html.twig']

        // extend twig
        $container->extend('twig', function($twig, $app) {
            // $twig->addExtension(...);
            return $twig;
        });
    }
}
