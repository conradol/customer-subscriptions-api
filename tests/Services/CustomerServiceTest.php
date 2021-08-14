<?php

use PHPUnit\Framework\TestCase;
use App\Services\CustomerService;

class CustomerServiceTest extends TestCase
{
    private $customerService;

    public function setUp() 
    {
        $this->customerService = new CustomerService();
    }


    public function testFindAll(): void
    {
        $customersMock = [
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

        $customers = $this->customerService->findAll();

        $this->assertEquals($customersMock, $customers);
    }

    public function testEditName(): void
    {
        $id = 2;
        $name = 'Customer Edited';
        $expected = [
            'id' => $id,
            'email' => 'email@email.com',
            'name'  => $name,
            'birthdate' => '1991-09-11',
            'gender' => 'Female'
        ];

        $returned = $this->customerService->editName($id, $name);
        
        $this->assertEquals($expected, $returned);
    }

}