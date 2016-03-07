<?php

namespace Mooc\Controller;

use Mooc\App;

class HomeController
{
    public function indexAction(App $app)
    {
        $user = $app['user.repository']->find(1);

        return $app->render('Home/index.html.twig');
    }
}
