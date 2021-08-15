<?php

use App\Repositories\CustomerRepository;
use PHPUnit\Framework\TestCase;
use App\Services\CustomerService;

class CustomerServiceTest extends TestCase
{
    private $customerService;
    private $customersMock = [
        [
            'id' => 1,
            'email' => 'email@email.com',
            'name'  => 'Customer One',
            'birthdate' => '1991-09-11',
            'gender' => 'male'
        ],
        [
            'id' => 2,
            'email' => 'email@email.com',
            'name'  => 'Customer Two',
            'birthdate' => '1991-09-11',
            'gender' => 'female'
        ]
    ];

    private $customerRepositoryMock;


    public function setUp(): void 
    {
        parent::setUp();

        $this->customerRepositoryMock = $this->createMock(CustomerRepository::class);                   
        $this->customerService = new CustomerService($this->customerRepositoryMock);
    }


    public function testFindAllReturningResults(): void
    {
        $this->customerRepositoryMock->method('findAll')->willReturn($this->customersMock);

        $customers = $this->customerService->findAll();

        $this->assertEquals($this->customersMock, $customers);
    }

    public function testFindAllReturningEmpty(): void
    {
        $this->customerRepositoryMock->method('findAll')->willReturn([]);
        $this->assertEquals($this->customerService->findAll(), []);
    }

    public function testEditNameSuccess(): void
    {
        $id = 2;
        $name = 'Customer Edited';
        $expected = $this->customersMock[1];
        $expected['name'] = $name;

        $this->customerRepositoryMock->method('edit')->willReturn($expected);
        
        $returned = $this->customerService->editName($id, $name);
        
        $this->assertEquals($expected, $returned);
    }

    public function testEditNameFail(): void
    {   
        $id = 1;
        $name = 'Customer Edited';

        $this->customerRepositoryMock->method('edit')->willReturn(null);

        $returned = $this->customerService->editName($id, $name);

        $this->assertNull($returned);
    }
}