<?php
namespace App\Controllers;

use App\Services\SubscriptionService;
use DateTime;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class SubscriptionController
{
    private $subscriptionService;

    public function __construct()
    {
        $this->subscriptionService = new SubscriptionService();
    }

    public function removePet(Request $request, Response $response, $args)
    {
        $subscriptionId = $args['id'];
        $petId = $args['petId'];

        $this->subscriptionService->removePet($subscriptionId, $petId);

        return $response->withStatus(204, "Deleted");
    }

    public function updateNextOrderDate(Request $request, Response $response, $args) 
    {
        $subscriptionId = $args['id'];
        $body = json_decode($request->getBody(), true);
        $newNextOrderDate = $body['nextOrderDate'];

        $subscription = $this->subscriptionService->updateNextOrderDate($subscriptionId, $newNextOrderDate);

        $response->getBody()->write(json_encode($subscription));
        return $response;
    }

    public function dispatchOrder(Request $request, Response $response, $args)
    {
        $subscriptionId = $args['id'];
        $now = new DateTime();
        $newNextOrderDate = $now->format('Y-m-d');

        $subscription = $this->subscriptionService->updateNextOrderDate($subscriptionId, $newNextOrderDate);

        if($subscription['nextOrderDate'] == $newNextOrderDate) {
            $response->getBody()->write(json_encode(true));
        } else {
            $response->withStatus(500);
            $response->getBody()->write(json_encode(false));
        }

        return $response;
    }
}