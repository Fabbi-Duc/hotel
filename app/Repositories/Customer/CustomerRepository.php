<?php

namespace App\Repositories\Customer;

use App\Models\Customers;
use App\Models\RoomsCustomer;
use App\Models\Bills;
use App\Models\RoomFoods;
use App\Models\RoomServiceFood;
use App\Repositories\RepositoryAbstract;
use Illuminate\Support\Arr;
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

            if ($data['name']) {
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
            $dataRoom = DB::table('rooms_customers')->where('room_id', $id['id'])->get();
            foreach ($dataRoom as $room) {
                if ($room->start_time <= $start_time && $room->end_time >= $start_time) {

                    return [
                        'success' => false,
                        'message' => 'Start Time not suitable'
                    ];
                } else if ($room->start_time <= $end_time && $room->end_time >= $end_time) {

                    return [
                        'success' => false,
                        'message' => 'End Time not suitable'
                    ];
                } else if ($room->start_time >= $start_time && $room->end_time <= $end_time) {
                    return [
                        'success' => false,
                        'message' => 'Start Time and End Time not suitable'
                    ];
                }
            }
            if(!$this->model->where('email', $data['email'])->get()) {
                $data['password'] = bcrypt($data['password']);
                $customer = $this->model->create($data);
                $room->customer_id = $customer->get()->last()->id;
            } else {
                $room->customer_id = $this->model->where('email', $data['email'])->first()->customer_id;
            }
            $room = new RoomsCustomer;
            $room->room_id = $id['id'];
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

            DB::table('rooms')->where('id', $id['id'])->update(['status' => 3]);


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

    public function getInfoRoomCustomer($id)
    {
        try {
            $room = DB::table('rooms_customers')->where('room_id', $id)->where('status', 1)->get();

            foreach ($room as $data) {
                $name = $this->model->where('id', $data->customer_id)->get('name');
                $data->name = $name[0]->name;
            }

            return [
                'success' => true,
                'data' => $room
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function getInfoCustomer($room_customer_id)
    {
        try {
            $customer = DB::table('rooms_customers')->find($room_customer_id);
            $data = $this->model->find($customer->customer_id);
            $data->start_time = $customer->start_time;
            $data->end_time = $customer->end_time;
            return [
                'success' => true,
                'data' => $data,
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function updateBookRoom($room_customer_id)
    {
        try {
            $customer = DB::table('rooms_customers')->find($room_customer_id);
            DB::table('rooms')->where('id', $customer->room_id)->update(['status' => 3]);
            DB::table('rooms_customers')->where('id', $room_customer_id)->update(['status' => 2]);
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

    public function pay($room_id)
    {
        try {
            $room = DB::table('rooms_customers')->where('room_id', $room_id)->where('status', 2)->first();
            $room_type = DB::table('rooms')->where('id', $room_id)->first();
            $cost = DB::table('room_types')->where('id', $room_type->room_type_id)->first();
            $first_date = strtotime($room->start_time);
            $second_date = strtotime($room->end_time);
            $datediff = abs($second_date - $first_date);
            if($datediff <= 1) {
                $data = $cost->cost_first_hour;
            } else {
                $data = $cost->cost_first_hour + (($datediff - 1)/(3600))*$cost->cost_next_hour;
            };

            return [
                'success' => true,
                'data' => $data,
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function food($data)
    {
        $id = $data['id'];
        $room = DB::table('rooms_customers')->where('customer_id', $id)->where('status', 2)->first();
        $room_food = DB::table('room_service_food')->where('room_id', $room->room_id)->where('status', 1)->first();
        if($room_food) {   
            foreach($data['food'] as $food_id)
            {   
                $food_room = new RoomFoods;
                $food_room->food_id = $food_id['id'];
                $food_room->count = $food_id['count'];
                $food_room->room_service_food_id = $room_food->id;
                $food_room->status = 1;

                $food_room->save();
            }
        } else {
            $service_food = new RoomServiceFood;
            $service_food->room_id = $room->room_id;
            $service_food->start_time = $room->start_time;
            $service_food->end_time = $room->end_time;
            $service_food->status = 1;
            $service_food->cost = 0;
            $service_food->save();


            $service = DB::table('room_service_food')->where('room_id', $service_food->room_id)->get()->last()->id;
            
            foreach($data['food'] as $food_id) {
                $food_room = new RoomFoods;
                $food_room->food_id = $food_id['id'];
                $food_room->count = $food_id['count'];
                $food_room->room_service_food_id = $service;
                $food_room->status = 1;
                $food_room->save();
            }
        }

        return [
            'succuss' => true
        ];
    }
}
