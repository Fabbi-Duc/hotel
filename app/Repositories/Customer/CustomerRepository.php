<?php

namespace App\Repositories\Customer;

use App\Models\Customers;
use App\Models\RoomsCustomer;
use App\Models\Bills;
use App\Repositories\RepositoryAbstract;
use Illuminate\Support\Facades\DB;

class CustomerRepository extends RepositoryAbstract implements CustomerRepositoryInterface
{
    public function model()
    {
        return Customers::class;
    }

    public function getListCustomer($data)
    {
        try {
            $list = $this->model;
            $perPage = $data['perPage'];
            $name = $data['name'];

            if($data['name']) {
                $list->where('name', 'LIKE', "%$name%");
            }
            
            return [
                'success' => true,
                'data' => $list->paginate($perPage)
            ];

        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function bookRoom($data, $id, $time)
    {
        try {
            $start_time = $time['start_time'];
            $end_time = $time['end_time'];
            $data = DB::table('rooms_customers')->where('room_id', $id['id'])->get();
            foreach($data as $room) {
                if($room->start_time <= $start_time && $room->end_time >= $start_time) {
    
                    return [
                        'success' => false,
                        'message' => 'Start Time not suitable'
                    ];
                } else if($room->start_time <= $end_time && $room->end_time >= $end_time) {
    
                    return [
                        'success' => false,
                        'message' => 'End Time not suitable'
                    ];
                } else if($room->start_time >= $start_time && $room->end_time <= $end_time) {
                    return [
                        'success' => false,
                        'message' => 'Start Time and End Time not suitable'
                    ];
                }
            }
            $data['password'] = bcrypt($data['password']);
            $customer = $this->model->create($data);
            $room = new RoomsCustomer;
            $room->room_id = $id['id'];
            $room->customer_id = $customer->get()->last()->id;
            $room->start_time = $time['start_time'];
            $room->end_time = $time['end_time'];
            $room->status = 2;
            $room->save();

            $bill = new Bills;
            $bill->room_id = $id['id'];
            $bill->start_time = $time['start_time'];
            $bill->end_time = $time['end_time'];
            $bill->status = 1;
            $bill->save();

            return [
                'success' => true,
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }
}