<?php

namespace App\Http\Controllers\Api;

use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class UserController extends ApiController
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function getListUsers(Request $request)
    {
        $result = $this->userRepository->getListUsers($request);

        return $this->sendSuccess($result);
    }

    public function sendMail(Request $request)
    {
        $data = $request->all();
        Mail::to($data['email'])->send(new SendMail($data['imgSrc']));
    } 
}
