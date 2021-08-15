<?php
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();


return
[
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/db/migrations',
        'seeds' => '%%PHINX_CONFIG_DIR%%/db/seeds'
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_environment' => 'development',
        'production' => [
            'adapter' => 'mysql',
            'host' => $_ENV['PHINX_MYSQL_HOST'],
            'name' => $_ENV['MYSQL_DATABASE'],
            'user' => $_ENV['MYSQL_USER'],
            'pass' => $_ENV['MYSQL_PASSWORD'],
            'port' => $_ENV['MYSQL_PORT'],
            'charset' => 'utf8',
        ],
        'development' => [
            'adapter' => 'mysql',
            'host' => $_ENV['PHINX_MYSQL_HOST'],
            'name' => $_ENV['MYSQL_DATABASE'],
            'user' => $_ENV['MYSQL_USER'],
            'pass' => $_ENV['MYSQL_PASSWORD'],
            'port' => $_ENV['MYSQL_PORT'],
            'charset' => 'utf8',
        ],
        'testing' => [
            'adapter' => 'mysql',
            'host' => $_ENV['PHINX_MYSQL_HOST'],
            'name' => $_ENV['MYSQL_DATABASE'],
            'user' => $_ENV['MYSQL_USER'],
            'pass' => $_ENV['MYSQL_PASSWORD'],
            'port' => $_ENV['MYSQL_PORT'],
            'charset' => 'utf8',
        ]
    ],
    'version_order' => 'creation'
];
