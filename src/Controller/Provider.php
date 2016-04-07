<?php

namespace App\Controller;

use Johndodev\Provider\AbstractProvider;
use Pimple\Container;
use Silex\Api\BootableProviderInterface;
use Silex\Api\ControllerProviderInterface;
use Silex\Application;
use Silex\ControllerCollection;

/**
 * Les controller en services et le routing
 */
class Provider extends AbstractProvider implements ControllerProviderInterface, BootableProviderInterface
{
    public function register(Container $container)
    {
        /**
         * Chaque controller aura un service, par ex pour HomeController: controller.home
         */
        foreach (['home'] as $controller) {
            $controllerclass = '\App\Controller\\'.ucfirst($controller).'Controller';

            $container['controller.'.$controller] = function() use($controllerclass) {
                return new $controllerclass();
            };
        }
    }

    /**
     * @inheritdoc
     */
    public function connect(Application $app)
    {
        /** @var ControllerCollection $factory */
        $factory = $app['controllers_factory'];

        $app->match('/', 'controller.home:indexAction')->bind('home');

        return $factory;
    }

    /**
     * @inheritdoc
     */
    public function boot(Application $app)
    {
        $app->mount(null, $this);
    }
}
