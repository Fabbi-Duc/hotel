<?php

namespace App\Services\Auth;

class AuthService implements AuthServiceInterface
{
    private $guard;

    public function __construct()
    {
        $this->guard = auth()->guard('api');
    }

    public function signIn($data)
    {
        // 
        $credentials = [
            'email' => $data['email'],
            'password' => $data['password']
        ];
        if (!$token = $this->guard->attempt($credentials)) {
            return [
                'success' => false,
            ];
        }

        return [
            'success' => true,
            'data' => $this->respondWithToken($token)
        ];
    }

    private function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard->factory()->getTTL() * 60
        ];
    }

    public function account()
    {
        return $this->guard->user();
    }
}
