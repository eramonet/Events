<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PushNotification extends Model
{
    public static function fire($token, $title, $body, $order_id = null,$type = null)
    {

        $SERVER_API_KEY = 'AAAAM0ZMo5Y:APA91bGMKL7aynImKE6Tjz_lN2YeJWePpf8jHxZ0uwbkJ6Tm88CcF97cCvvwxlLOQQ8yrmg8VmUqQEzMmEHuiZMWhG1zVnAaO6KIKkq7NOFA3bpzUxt0IO-5Q-w0EcXsYpdlbGU9gogF';
        $token_1        = $token;
        $data           = [
            "registration_ids" => [
                $token_1
            ],

            "notification" => [
                'sound'    => 'default',
                'title'    => $title,
                'body'     => $body,
                'message'  => $body,
                'order_id' => $order_id,
                'type'     => $type,
            ],
            "data"         => [
                'title'        => $title,
                'body'         => $body,
                'redirectID'   => $order_id,
                'redirectType' => $type,
            ],
            'vibrate'      => 1,
            'sound'        => 1,
        ];

        $dataString = json_encode($data);
        $headers    = [

            'Authorization: key=' . $SERVER_API_KEY,

            'Content-Type: application/json',

        ];
        $ch         = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');

        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);
        //dd($response);
        $object = (object)$data['data'];
        return $object;
    }

}