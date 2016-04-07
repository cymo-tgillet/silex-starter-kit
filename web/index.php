<?php

use App\App;

require_once __DIR__.'/../vendor/autoload.php';

$env = getenv('ENV') ?: App::ENV_PROD;
$app = new App($env, $env == App::ENV_DEV);

$app->run();
