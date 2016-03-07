<?php

return [
    'connections' => [

        'default' => [
            'driver'    => 'pdo_mysql',
            'host'      => '127.0.0.1',
            'dbname'  	=> '%database.dbname%',
            'user'      => '%database.user%',
            'password'  => '%database.password%',
        ]
    ]
];
