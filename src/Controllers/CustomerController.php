<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class CustomerController 
{
    public function index(Request $request, Response $response, $args) 
    {
        $customers = [
            [
                'id' => 1,
                'email' => 'email@email.com',
                'name'  => 'Customer One',
                'birthdate' => '1991-09-11',
                'gender' => 'Male'
            ],
            [
                'id' => 2,
                'email' => 'email@email.com',
                'name'  => 'Customer Two',
                'birthdate' => '1991-09-11',
                'gender' => 'Female'
            ]
        ];

    
        $response->getBody()->write(json_encode($customers));
        return $response;
    } 
}