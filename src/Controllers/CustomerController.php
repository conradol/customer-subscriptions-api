<?php
namespace App\Controllers;

use App\Services\CustomerService;
use App\Services\SubscriptionService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class CustomerController 
{
    private $customerService;
    private $subscriptionService;

    public function __construct()
    {
        $this->customerService = new CustomerService();
        $this->subscriptionService = new SubscriptionService();    
    }

    public function index(Request $request, Response $response, $args) 
    {
        $customers = $this->customerService->findAll();    
        $response->getBody()->write(json_encode($customers));
        return $response;
    }

    public function editName(Request $request, Response $response, $args)
    {
        $body = json_decode($request->getBody(), true);
        $name = $body['name'];
        $id = $args['id'];
        
        $customer = $this->customerService->editName($id, $name);

        $response->getBody()->write(json_encode($customer));
        return $response;
    }

    public function getSubscription(Request $request, Response $response, $args)
    {
        $subscription = $this->subscriptionService->findByCustomerId($args['id']);
        $response->getBody()->write(json_encode($subscription));
        return $response;
    }
}