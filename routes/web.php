<?php

use App\Notifications\SmsMessage;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/sms', function () {
    try {
        $accountSid = config("external-apis.twilio.sid");
        $authToken = config("external-apis.twilio.token");
        $twilioNumber = config("external-apis.twilio.number");

        $client = new Client($accountSid, $authToken);

        $client->messages->create('+37494880704', [
            'from' => $twilioNumber,
            'body' => 'babe shark tu turu tutu'
        ]);

        dd('Sms has been successfully sent.');

    } catch (\Exception $e) {
        dd($e->getMessage());
    }
});


Route::get('/sms-2', function () {
    return (new SmsMessage)
        ->from( config("external-apis.twilio.number_from"))
        ->to(config("external-apis.twilio.number_to"))
        ->send();
});
