<?php 
namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository 
{
    public function findAll()
    {
        return Customer::all();
    }

    public function edit($id, $data)
    {
        $customer = Customer::find($id);

        if(!empty($customer)) {
            $customer->update($data);
        }

        return $customer;
    }
}