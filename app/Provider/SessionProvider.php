<?php

namespace Mooc\Provider;

use Johndodev\Provider\AbstractProvider;
use Pimple\Container;

class SessionProvider extends AbstractProvider
{
    public function register(Container $container)
    {
        $container['session.storage.options'] = [
            'cookie_lifetime' => 2629743, // 1 mois
            'gc_maxlifetime' => 2629743, // 1 mois
            'gc_probability' => 1,
            'gc_divisor' => 100,
            'cookie_httponly' => true
        ];
    }
}
