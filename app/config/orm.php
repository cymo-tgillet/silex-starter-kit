<?php

return [
    'orm.managers' => [
        'default' => [
            'connection' => [
                'driver'    => 'pdo_mysql',
                'host'      => '127.0.0.1',
                'dbname'  	=> '%database.dbname%',
                'user'      => '%database.user%',
                'password'  => '%database.password%',
                'charset'   => 'utf8'
            ],

            'entity_paths' => [__DIR__.'/../Entity']
        ]
    ],

    'orm.entity_listeners' => [
        'Mooc\Listener\UserListener' => 'user.listener',
    ],
];
