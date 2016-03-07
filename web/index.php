<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Mooc\App(\Mooc\App::ENV_DEV, true);

$app->run();
