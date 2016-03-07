<?php

namespace Mooc\Provider;

use Johndodev\Provider\AbstractProvider;
use Pimple\Container;

/**
 * Register services related to entities
 */
class EntityProvider extends AbstractProvider
{
    public function register(Container $container)
    {
        $container['user.repository'] = function(Container $container) {
            return $container['em']->getRepository('Mooc\Entity\User');
        };
    }
}
