<?php

use DI\Container;
use Carbon\Carbon;
use Slim\Factory\AppFactory;

$container = new Container();

AppFactory::setContainer($container);

$container -> set('carbon', function() {
    return new Carbon();
});

$container->set('db', function() {
    return new \PDO('sqlite:database/db.sqlite');
});

// last line always
$app = AppFactory::create();