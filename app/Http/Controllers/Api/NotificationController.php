<?php

namespace App\Http\Controllers\Api;

use App\Events\SendNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends ApiController
{
    public function saveDeviceToken(Request $request)
    {
        dd($request->all());
    }

    public function sendNotificationFirebase(Request $request)
    {
        $registration_ids = [$request->tokenBrowse];
        $data = [
            "registration_ids" => $registration_ids,
            "notification" => [
                "sound" => "default",
                "body" => "test body",
                "title" => "test title",
                "content_available" => true,
                "priority" => "high"
            ],
            "data" => [
                "sound" => "default",
                "count" => 7,
                "body" => "test body",
                "title" => "test title",
                "content_available" => true,
                "priority" => "high"
            ]
        ];

        $dataString = json_encode($data);
        $headers = [
            'Authorization: key=' . config('app.firebase_server_key'),
            'Content-Type: application/json',
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
        curl_exec($ch);
    }

    public function sendNotification(Request $request)
    {
        broadcast(new SendNotification($request->message, Auth::user()->id))->toOthers();
    }
}
