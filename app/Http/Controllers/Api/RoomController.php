<?php

namespace App\Http\Controllers\Api;

use App\Repositories\Room\RoomRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    private $roomRepository;

    public function __construct(RoomRepositoryInterface $roomRepository)
    {
        $this->roomRepository = $roomRepository;
    }

    public function getCodeRoom(Request $request)
    {
        $data = $request->all();
        $result = $this->roomRepository->getCodeRoom($data);
        return $result;
    }
}
