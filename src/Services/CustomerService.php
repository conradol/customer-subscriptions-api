<?php
namespace App\Services;

use App\Models\Customer as Customer;

class CustomerService {

    private $customers = [
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


    public function findAll()
    {
        return $this->customers;
    }

    public function editName($id, $name) 
    {
        $index = array_search($id, array_column($this->customers, 'id'));

        $this->customers[$index]['name'] = $name;

        return $this->customers[$index];
    }
}