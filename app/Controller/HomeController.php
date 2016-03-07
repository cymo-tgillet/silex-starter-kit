<?php

namespace Mooc\Controller;

use Mooc\App;

class HomeController
{
    public function indexAction(App $app)
    {
        return $app->render('Home/index.html.twig');
    }
}
