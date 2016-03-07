<?php

namespace Mooc\ORM;

use Doctrine\ORM\Mapping\DefaultEntityListenerResolver;
use Pimple\Container;

class EntityListenerResolver extends DefaultEntityListenerResolver
{
    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    public function resolve($className)
    {
//        switch ($className) {
//            case '':
//                return ;
//
//        }

        return parent::resolve($className);
    }
}
