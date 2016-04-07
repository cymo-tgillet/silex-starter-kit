<?php

namespace App\Provider;

use Johndodev\ORM\EntityConverter;
use Johndodev\Provider\AbstractProvider;
use Pimple\Container;

/**
 * Register services related to entities
 */
class EntityProvider extends AbstractProvider
{
    public function register(Container $container)
    {
        // Repo & param_converter dynamique automatique
        foreach (['user'] as $entity) {
            // repo
            $container[$entity.'.repository'] = function(Container $container) use ($entity) {
                $class = 'App\Entity\\'.ucfirst($entity);
                return $container['em']->getRepository($class); // TODO orm->getManagerForclass()
            };

            // param converter
            $container[$entity.'.param_converter'] = function(Container $container) use ($entity) {
                return new EntityConverter($container[$entity.'.repository']);
            };
        }
    }
}
