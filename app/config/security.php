<?php

return [
    'security.providers' => [
        'user' => [
            'class' => 'Mooc\Entity\User',
            'property' => 'email',
            'manager_name' => 'em',
        ]
    ],

    'security.firewalls' => [
        'main' => [
            'pattern' => '.*',
            'form' => ['login_path' => '/login', 'check_path' => '/login_check', 'use_forward' => true],
            'logout' => ['logout_path' => '/logout'],
            'anonymous' => true,
            'users' => function() use ($container) {
                return $container['security.user.chain_provider'];
            },
        ]
    ],

    'security.access_rules' => [
        ['^/admin/.*', 'ROLE_ADMIN'],
    ],

    'security.role_hierarchy' => [
        'ROLE_ADMIN' => ['ROLE_USER', 'ROLE_ALLOWED_TO_SWITCH'],
    ],
];
