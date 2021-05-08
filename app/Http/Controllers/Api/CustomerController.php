<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Customer\CustomerRepositoryInterface;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function getCustomersList(Request $request)
    {
        $data = $request->all();
        $result = $this->customerRepository->getListCustomer($data);
        return $result;
    }

    public function bookRoom(Request $request)
    {
        $data = $request->only('name', 'email', 'birthday', 'password', 'gender', 'identity_card', 'phone');
        $id = $request->only('id');
        $time = $request->only('start_time', 'end_time');
        $result = $this->customerRepository->bookRoom($data, $id, $time);
        return $result;
    }

}
