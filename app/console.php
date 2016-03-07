<?php

namespace Mooc;

require_once __DIR__.'/../vendor/autoload.php';

$app = new App(App::ENV_DEV, true);

$console = $app->getConsole();
$console->run();
