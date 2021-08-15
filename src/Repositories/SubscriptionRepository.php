<?php
namespace App\Repositories;

use App\Models\Subscription;

class SubscriptionRepository 
{
    public function findByCustomerId($customerId)
    {
        return Subscription::where('customer_id', $customerId)->with('Pet')->first();
    }

    public function edit($id, $data)
    {
        $subscription = Subscription::find($id);

        if ($subscription)
        {
            return $subscription->update($data);
        }

        return false;
    }
}