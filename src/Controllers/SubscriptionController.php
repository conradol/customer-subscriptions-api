<?php
namespace App\Controllers;

use App\Services\SubscriptionService;
use DateTime;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class SubscriptionController
{
    private $subscriptionService;

    public function __construct(SubscriptionService $subscriptionService)
    {
        $this->subscriptionService = $subscriptionService;
    }

    public function removePet(Request $request, Response $response, $args)
    {
        $petId = $args['petId'];

        $this->subscriptionService->removePet($petId);

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
        $result = $this->subscriptionService->updateNextOrderDate($subscriptionId);

        $response->getBody()->write(json_encode($result));

        if (!$result) {
            $response->withStatus(500);
        }

        return $response;
    }
}