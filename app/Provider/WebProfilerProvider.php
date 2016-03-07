<?php

namespace Mooc\Provider;

use Johndodev\Provider\AbstractProvider;
use Pimple\Container;

class WebProfilerProvider extends AbstractProvider
{
    public function register(Container $container)
    {
        $container['profiler.cache_dir'] = __DIR__.'/../cache/profiler';
    }
}
