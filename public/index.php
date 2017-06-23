<?php

use Interop\Http\ServerMiddleware\DelegateInterface;
use Zend\Diactoros\Response\TextResponse;
use Zend\Expressive\AppFactory;

chdir(dirname(__DIR__));
require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->get('/', function ($request, DelegateInterface $delegate) {
    return new TextResponse('Hello, world!');
});

$app->pipeRoutingMiddleware();
$app->pipeDispatchMiddleware();
$app->run();
