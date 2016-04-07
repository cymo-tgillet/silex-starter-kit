<?php

namespace App;

require_once __DIR__.'/../vendor/autoload.php';

$env = getenv('ENV') ?: App::ENV_PROD;
$app = new App($env, $env == App::ENV_DEV);
// boot ?

$console = $app->getConsole();
$console->run();
