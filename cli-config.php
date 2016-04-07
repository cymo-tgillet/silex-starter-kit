<?php

/**
 * DOCTRINE CLI CONFIG
 */

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use App\App;

$env = getenv('ENV') ?: App::ENV_DEV;
$app = new App($env, $env == App::ENV_DEV);
$app->boot();

return ConsoleRunner::createHelperSet($app['em']);
