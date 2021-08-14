<?php
use App\Controllers\CustomerController as CustomerController; 

$app->get('/customer', CustomerController::class . ':index');
$app->put('/customer/{id}/name', CustomerController::class . ':editName');
$app->get('/customer/{id}/subscription', CustomerController::class . ':getSubscription');