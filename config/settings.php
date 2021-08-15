<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
date_default_timezone_set('Europe/Lisbon');

$settings = [];
$settings['root'] = dirname(__DIR__);
$settings['error'] = [
    'display_error_details' => true,
    'log_errors' => true,
    'log_error_details' => true,
];

$settings['db'] = [
    'driver' => 'mysql',
    'host' => 'db',
    'database' => 'test',
    'username' => 'root',
    'password' => 'root',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
];

return $settings;
