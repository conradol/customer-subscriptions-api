<?php
namespace App\Services;

use App\Repositories\CustomerRepository;

class CustomerService {

    private $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function findAll()
    {
        return $this->customerRepository->findAll();
    }

    public function editName($id, $name) 
    {
        return $this->customerRepository->edit($id, ['name' => $name]);
    }
}