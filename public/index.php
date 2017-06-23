<?php

chdir(dirname(__DIR__));
require 'vendor/autoload.php';
/**
 * Self-called anonymous function that creates its own scope and keep the global namespace clean.
 */
call_user_func(function () {
    /** @var \Interop\Container\ContainerInterface $container */
    $container = require 'config/container.php';
    /** @var \Zend\Expressive\Application $app */
    $app = $container->get(\Zend\Expressive\Application::class);
    // Import programmatic/declarative middleware pipeline and routing
    // configuration statements
    require 'config/pipeline.php';
    require 'config/routes.php';
    $app->run();
});
