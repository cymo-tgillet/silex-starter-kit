<?php

namespace Mooc\Provider;

use Johndodev\Provider\AbstractProvider;
use Pimple\Container;
use Silex\Provider\TwigServiceProvider;
use Symfony\Bridge\Doctrine\Security\User\EntityUserProvider;

class SecurityProvider extends AbstractProvider
{
    public function register(Container $container)
    {
        $container['security.user.class'] = 'TODO';
        $container['security.user.property'] = 'email';

        $container['security.firewalls'] = [
            'main' => [
                'pattern' => '.*',
                'form' => ['login_path' => '/', 'check_path' => '/login_check'],
                'logout' => ['logout_path' => '/logout'],
                'anonymous' => true,
                'users' => function() use ($container) {
                    return $container['security.user.provider'];
                },
                //'use_forward' => true
            ]
        ];

//        $container['security.access_rules'] = [
//            ['^/dashboard', 'ROLE_USER'],
//            ['^/account', 'ROLE_USER'],
//            ['^/admin', 'ROLE_ADMIN'],
//            ['^/messages', 'ROLE_USER'],
//            ['^/pokes', 'ROLE_USER'],
//            ['^/search', 'ROLE_USER'],
//            ['^/signup', 'ROLE_USER'],
//            ['^/upload', 'ROLE_USER'],
//            ['^/upload', 'ROLE_USER'],
//            ['^/user/', 'ROLE_USER'],
//            ['^/users', 'ROLE_USER'],
//            ['^/wishlist/wish', 'ROLE_USER'],
//        ];
    }
}
