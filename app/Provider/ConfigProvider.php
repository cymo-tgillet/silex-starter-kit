<?php

namespace Mooc\Provider;

use Johndodev\Component\Config\ConfigBag;
use Johndodev\Provider\AbstractProvider;
use Pimple\Container;

class ConfigProvider extends AbstractProvider
{
    private $dir;

    /**
     * @param string $dir
     */
    public function __construct($dir)
    {
        $this->dir = $dir;
    }

    public function register(Container $container)
    {
        $dir = $this->dir;

        $container['config'] = function($container) use ($dir) {
            return new ConfigBag($dir);
        };
    }
}
