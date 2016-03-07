<?php

namespace Mooc\Provider;

use Johndodev\Provider\AbstractProvider;
use Mooc\ORM\EntityListenerResolver;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Pimple\Container;

/**
 * Class DoctrineProvider
 * @package Mooc\Provider
 */
class DoctrineProvider extends AbstractProvider
{
    public function register(Container $container)
    {
        $container['doctrine.entity_paths'] = [__DIR__.'/../Entity'];
        $container['db_params'] = $container['config']->get('database.connections.default');

        // entityListenerResolver
        $container['orm.entity_listener_resolver'] = function($container) {
            return new EntityListenerResolver($container);
        };

        // EntityManager (à délocaliser dans le dépot base project ?)
        $container['em'] = function(Container $container) {
            $config = Setup::createAnnotationMetadataConfiguration($container['doctrine.entity_paths'], $container['debug'], null, null, false);

            // set custom entityListenerResolver
            if (isset($container['orm.entity_listener_resolver'])) {
                $config->setEntityListenerResolver($container['orm.entity_listener_resolver']);
            }

            return EntityManager::create($container['db_params'], $config);
        };
    }
}
