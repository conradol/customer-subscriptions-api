<?php

use App\Controllers\SubscriptionController as SubscriptionController;

$app->delete('/subscription/{id}/pet/{petId}', SubscriptionController::class . ':removePet');
$app->put('/subscription/{id}/next-order-date', SubscriptionController::class . ':updateNextOrderDate');
$app->post('/subscription/{id}/dispatch', SubscriptionController::class . ':dispatchOrder');