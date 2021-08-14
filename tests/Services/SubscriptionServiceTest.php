<?php

use PHPUnit\Framework\TestCase;
use App\Services\SubscriptionService;

class SubscriptionServiceTest extends TestCase
{
    private $subscriptionService;
    private $subscriptionsMock;

    public function setUp()
    {
        $this->subscriptionService = new SubscriptionService();
        $this->subscriptionsMock = [
            [
                'id' => 1,
                'customerId' => 1,
                'basePrice' => 50,
                'totalPrice' => 100,
                'nextOrderDate' => '2021-08-14',
                'pets' => [
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
                'customerId' => 2,
                'basePrice' => 50,
                'totalPrice' => 50,
                'nextOrderDate' => '2021-08-15',
                'pets' => [
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
    }


    public function testFindByCustomerId()
    {
        $customerId = 2;

        $expected = array_search($customerId, array_column($this->subscriptionsMock, 'customerId'));
        $returned = $this->subscriptionService->findByCustomerId($customerId);

        $this->assertEquals($this->subscriptionsMock[$expected], $returned);
    }

}