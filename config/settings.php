<?php
use Dotenv\Dotenv;

error_reporting(E_ALL);
ini_set('display_errors', '1');
date_default_timezone_set('Europe/Lisbon');


$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$settings = [];
$settings['root'] = dirname(__DIR__);
$settings['error'] = [
    'display_error_details' => true,
    'log_errors' => true,
    'log_error_details' => true,
];

$settings['db'] = [
    'driver'    => 'mysql',
    'host'      => $_ENV['MYSQL_HOST'],
    'port'      => $_ENV['MYSQL_PORT'],
    'database'  => $_ENV['MYSQL_DATABASE'],
    'username'  => $_ENV['MYSQL_USER'],
    'password'  => $_ENV['MYSQL_PASSWORD'],
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
];

return $settings;
