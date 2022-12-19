<?php

return [
    'inforu' => [
        'service_enabled' => env('INFORU_SERVICE_ENABLED', false),
        'login' => env('INFORU_LOGIN'),
        'api_token' => env('INFORU_API_TOKEN'),
        'sender_name' => env('INFORU_SENDER_NAME'),
        'xml_endpoint' => 'https://uapi.inforu.co.il/SendMessageXml.ashx'
    ],
    'twilio' => [
        'sid' => env('TWILIO_SID'),
        'token' => env('TWILIO_AUTH_TOKEN'),
        'number_from' => env('TWILIO_NUMBER_FROM'),
        'number_to' => env('TWILIO_NUMBER_TO'),
    ]
];
