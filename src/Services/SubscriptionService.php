<?php
namespace App\Services;

use App\Repositories\PetRepository;
use App\Repositories\SubscriptionRepository;
use DateTime;

class SubscriptionService
{
    private $subscriptions = [
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

    private $subscriptionRepository;
    private $petRepository;

    public function __construct(
        SubscriptionRepository $subscriptionRepository,
        PetRepository $petRepository    
    )
    {
        $this->subscriptionRepository = $subscriptionRepository;
        $this->petRepository = $petRepository;
    }
    
    public function findByCustomerId($customerId)
    {
       return $this->subscriptionRepository->findByCustomerId($customerId);
    }

    public function removePet($petId) 
    {
        return $this->petRepository->delete($petId);
    }

    public function updateNextOrderDate($id)
    {   
        $newNextOrderDate = new DateTime();
        return $this->subscriptionRepository->edit($id, ['next_order_date' => $newNextOrderDate]);
    }
}