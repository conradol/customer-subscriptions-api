<?php
namespace App\Services;

class SubscriptionService
{
    private $subscriptions = [
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
    
    public function findByCustomerId($customerId)
    {
        $subscription = array_filter($this->subscriptions, function($subscription) use ($customerId) {
            return $subscription['customerId'] == $customerId;
        });

        return $subscription;
    }
}