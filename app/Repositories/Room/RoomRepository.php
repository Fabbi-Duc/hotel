<?php

namespace App\Repositories\Room;

use App\Models\Room;
use App\Repositories\RepositoryAbstract;

class RoomRepository extends RepositoryAbstract implements RoomRepositoryInterface
{
    public function model()
    {
        return Room::class;
    }

    public function getCodeRoom($data)
    {
        try {
            $list = $this->model;
            $name = $data['name'];
            $code = $list->where('name', $name)->get();          
            return [
                'success' => true,
                'code' => $code[0]['code_room']
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }
}
