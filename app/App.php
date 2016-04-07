<?php

namespace Mooc;

use Johndodev\Component\Config\ConfigProvider;
use Johndodev\Kernel;

class App extends Kernel
{
    /**
     * @inheritdoc
     */
    protected function getProviders()
    {
        return [
            new Provider\TwigProvider(),
            new Controller\Provider(),
            new Provider\MonologProvider(),
            new Provider\EntityProvider(),
            new ConfigProvider([
                __DIR__.'/config/config.php',
                __DIR__.'/config/session.php',
                __DIR__.'/config/twig.php',
                __DIR__.'/config/email.php',
                __DIR__.'/config/orm.php',
                __DIR__.'/config/security.php',
            ], __DIR__.'/config/parameters.php'),
        ];
    }
}
