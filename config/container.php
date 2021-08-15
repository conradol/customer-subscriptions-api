<?php

use Psr\Container\ContainerInterface;
use Slim\App;
use Slim\Factory\AppFactory;
use Slim\Middleware\ErrorMiddleware;
use Illuminate\Database\Capsule\Manager as Connection;
use Illuminate\Database\Connectors\ConnectionFactory;

return [
    'settings' => function () {
        return require __DIR__ . '/settings.php';
    },

    App::class => function (ContainerInterface $container) {
        AppFactory::setContainer($container);

        return AppFactory::create();
    },

    ErrorMiddleware::class => function (ContainerInterface $container) {
        $app = $container->get(App::class);
        $settings = $container->get('settings')['error'];

        return new ErrorMiddleware(
            $app->getCallableResolver(),
            $app->getResponseFactory(),
            (bool)$settings['display_error_details'],
            (bool)$settings['log_errors'],
            (bool)$settings['log_error_details']
        );
    },
    
    Connection::class => function (ContainerInterface $container) {
        $settings = $container->get('settings')['db'];
        $capsule = new Connection();
        $capsule->addConnection($settings);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();

        $factory = new ConnectionFactory(new \Illuminate\Container\Container());

        $connection = $factory->make($settings);

        $connection->disableQueryLog();

        return $connection;
    },
    
    PDO::class => function (ContainerInterface $container) {
        return $container->get(Connection::class)->getPdo();
    }
];
