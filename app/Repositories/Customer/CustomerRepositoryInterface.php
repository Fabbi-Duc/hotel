<?php

namespace App\Repositories\Customer;

use App\Repositories\RepositoryInterface;

interface CustomerRepositoryInterface extends RepositoryInterface
{
    public function getListCustomer($data);
    public function bookRoom($data, $id, $time);
}
