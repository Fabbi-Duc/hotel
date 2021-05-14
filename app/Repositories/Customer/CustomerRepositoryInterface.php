<?php

namespace App\Repositories\Customer;

use App\Repositories\RepositoryInterface;

interface CustomerRepositoryInterface extends RepositoryInterface
{
    public function registerCustomer($data);
    public function getListCustomer($data);
    public function bookRoom($data, $id, $time);
    public function getInfoRoomCustomer($id);
    public function getInfoCustomer($room_customer_id);
    public function updateBookRoom($room_customer_id);
    public function pay($room_id);
    public function food($data);
}
