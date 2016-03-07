<?php

namespace Mooc\Controller;

use Johndodev\Provider\AbstractProvider;
use Pimple\Container;
use Silex\Application;

/**
 * Les controller en services et le routing
 */
class Provider extends AbstractProvider
{
    public function register(Container $container)
    {
        $container['controller.home'] = function() {
            return new HomeController();
        };

        $this->registerRoutes($container);
    }

    // TODO fix incohérence
    private function registerRoutes(Application $app)
    {
        $app->match('/', 'controller.home:indexAction')->bind('home');
    }
}
