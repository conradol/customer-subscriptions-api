<?php
use App\Controllers\CustomerController as CustomerController; 

$app->get('/customer', CustomerController::class . ':index');