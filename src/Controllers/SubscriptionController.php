<?php
namespace App\Controllers;

use App\Services\SubscriptionService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Exception\HttpBadRequestException;
use Slim\Exception\HttpNotFoundException;

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

        $result = $this->subscriptionService->removePet($petId);

        if (!$result) {
            throw new HttpNotFoundException($request, "Pet $petId not found");
        }
        
        return $response->withStatus(204, "Deleted");
    }
    
    public function updateNextOrderDate(Request $request, Response $response, $args) 
    {
        $id = $args['id'];
        $body = json_decode($request->getBody(), true);
        
        if (empty($body['next_order_date'])) { 
            throw new HttpBadRequestException($request, 'next_order_date is required');
        }

        if (\DateTime::createFromFormat('Y-m-d', $body['next_order_date']) === false) {
            throw new HttpBadRequestException($request, 'next_order_date must be a valid date');
        }

        $subscription = $this->subscriptionService->updateNextOrderDate($id, $body['next_order_date']);

        if(!$subscription) {
            throw new HttpNotFoundException($request, "Subscription $id not found");
        }

        $response->getBody()->write(json_encode($subscription));
        return $response;
    }

    public function dispatchOrder(Request $request, Response $response, $args)
    {
        $id = $args['id'];
        $result = $this->subscriptionService->dispatch($id);

        if (!$result) {
            throw new HttpNotFoundException($request, "Subscription $id not found");
        }

        return $response;
    }
}