<?php

return [
    // Debug toolbar
    //---------------
    'profiler.cache_dir' => __DIR__.'/../../var/cache/profiler',

    // Paths
    //-------
    'app.web_path' => realpath(__DIR__.'/../../web').'/',

    // translator
    //------------
    'translator.resources' => [
        ['array', include __DIR__.'/../lang/messages.fr.php', 'fr', 'messages'],
    ],

    // monolog
    //--------
    'monolog.logfile'   => __DIR__.'/../../var/logs/'.$container['env'].'.log',
    'monolog.name'      => 'mooc-'.$container['env'],
//    'sentry.dsn'        => null,

    // statsd
    //-------
//    'statsd.clients' => [
//        'default' => ['address' => '%statsd.address%', 'port' => 8125]
//    ]

];
