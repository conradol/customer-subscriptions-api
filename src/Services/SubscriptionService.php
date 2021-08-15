<?php
namespace App\Services;

use App\Repositories\PetRepository;
use App\Repositories\SubscriptionRepository;
use DateTime;

class SubscriptionService
{
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

    public function updateNextOrderDate($id, $newNextOrderDate)
    {   
        return $this->subscriptionRepository->edit($id, ['next_order_date' => $newNextOrderDate]);
    }

    public function dispatch($id)
    {
        return $this->updateNextOrderDate($id, date('Y-m-d'));
    }
}