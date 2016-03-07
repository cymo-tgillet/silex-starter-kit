<?php

/**
 * DOCTRINE CLI CONFIG
 */

use Doctrine\ORM\Tools\Console\ConsoleRunner;

$app = new \Mooc\App(\Mooc\App::ENV_DEV, true); // TODO juste silex/application
$app->register(new \Mooc\Provider\DoctrineProvider());

return ConsoleRunner::createHelperSet($app['em']);
