<?php

namespace Mooc;

use Johndodev\Kernel;
use Mooc\Provider\MonologProvider;
use Mooc\Provider\SecurityProvider;
use Mooc\Provider\SessionProvider;
use Mooc\Provider\SwiftMailerProvider;
use Mooc\Provider\WebProfilerProvider;

class App extends Kernel
{
    /**
     * @inheritdoc
     */
    protected function getProviders()
    {
        return [
            new Provider\ConfigProvider(__DIR__.'/config'),
            new Provider\DoctrineProvider(),
            new Provider\TwigProvider(),
            new Controller\Provider(),
            new SwiftMailerProvider(),
            new MonologProvider(),
            new SecurityProvider(),
            new SessionProvider(),
            new WebProfilerProvider(),
        ];
    }
}
