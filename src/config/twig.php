<?php

return [
    'twig.path' => array_merge($container['twig.path'], [
        __DIR__.'/../View',
        __DIR__.'/../../vendor/symfony/twig-bridge/Resources/views/Form',
    ]),

    'twig.options' => [
        'debug' => $container['debug'],
        'cache' => __DIR__.'/../../var/cache/twig',
        'strict_variables' => true,
    ],

    'twig.form.templates' => ['Form/bootstrap_3_horizontal_layout.html.twig'],
];
