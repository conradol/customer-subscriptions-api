<?php

use App\Repositories\PetRepository;
use App\Repositories\SubscriptionRepository;
use PHPUnit\Framework\TestCase;
use App\Services\SubscriptionService;

class SubscriptionServiceTest extends TestCase
{
    private $subscriptionService;
    private $subscriptionsMock = [
        [
            'id' => 1,
            'customer_id' => 1,
            'base_price' => 50,
            'total_price' => 100,
            'next_order_date' => '2021-08-14',
            'pet' => [
                [
                    'id' => 1,
                    'name' => 'Pet One',
                    'gender' => 'female',
                    'lifestage' => 'adult',
                    'weight' => 10,
                ],
                [
                    'id' => 2,
                    'name' => 'Pet Two',
                    'gender' => 'male',
                    'lifestage' => 'puppy',
                    'weight' => 3,
                ]
            ]
        ],
        [
            'id' => 2,
            'customer_id' => 2,
            'base_price' => 50,
            'total_price' => 50,
            'next_order_date' => '2021-08-15',
            'pet' => [
                [
                    'id' => 1,
                    'name' => 'Pet One',
                    'gender' => 'female',
                    'lifestage' => 'adult',
                    'weight' => 10,
                ]
            ]
        ]
    ];

    private $subscriptionsRepositoryMock;
    private $petRepositoryMock;

    protected function setUp(): void
    {
        $this->subscriptionsRepositoryMock = $this->createMock(SubscriptionRepository::class);
        $this->petRepositoryMock = $this->createMock(PetRepository::class);
        $this->subscriptionService = new SubscriptionService($this->subscriptionsRepositoryMock, $this->petRepositoryMock);
    }
    

    public function testFindByCustomerIdReturningAResult()
    {
        $customerId = 2;

        $expected = array_search($customerId, array_column($this->subscriptionsMock, 'customer_id'));
        $this->subscriptionsRepositoryMock->method('findByCustomerId')->willReturn($this->subscriptionsMock[$expected]);
        $returned = $this->subscriptionService->findByCustomerId($customerId);

        $this->assertEquals($this->subscriptionsMock[$expected], $returned);
    }

    public function testFindByCustomerIdWhitoutResultsMustReturnNull()
    {
        $customerId = 2;
        $this->subscriptionsRepositoryMock->method('findByCustomerId')->willReturn(null);
        $returned = $this->subscriptionService->findByCustomerId($customerId);

        $this->assertEquals($returned, null);
    }


    public function testRemovePetSuccess()
    {
        $petId = 2;
        $this->petRepositoryMock->method('delete')->willReturn(true);
        $returned = $this->subscriptionService->removePet($petId);

        $this->assertTrue($returned);
    }

    public function testRemovePetFail()
    {
        $petId = 2;
        $this->petRepositoryMock->method('delete')->willReturn(false);
        $returned = $this->subscriptionService->removePet($petId);

        $this->assertFalse($returned);
    }

    public function testUpdateNextOrderDateSuccess()
    {
        $subscriptionId = 2;
        $newNextOrderDate = '2021-09-15';
        $this->subscriptionsRepositoryMock->method('edit')->willReturn(true);
        
        $returned = $this->subscriptionService->updateNextOrderDate($subscriptionId, $newNextOrderDate);

        $this->assertTrue($returned);
    }

    public function testUpdateNextOrderDateFail()
    {
        $subscriptionId = 2;
        $newNextOrderDate = '2021-09-15';
        $this->subscriptionsRepositoryMock->method('edit')->willReturn(false);
        
        $returned = $this->subscriptionService->updateNextOrderDate($subscriptionId, $newNextOrderDate);

        $this->assertFalse($returned);
    }

}