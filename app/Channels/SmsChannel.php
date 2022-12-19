<?php


namespace App\Channels;

use Illuminate\Notifications\Notification;
use Exception;
use Illuminate\Support\Facades\Log;

class SmsChannel
{
    /**
     * Send the given notification.
     *
     * @param mixed $notifiable
     * @param Notification $notification
     * @return void
     * @throws Exception
     */
    public function send(mixed $notifiable, Notification $notification)
    {
        try {
            $message = $notification->toSms($notifiable);
            $message->send();
        } catch (exception $e){
            Log::notice('SMS is not correct');
            Log::notice($e);
            throw new Exception('SMS is not correct');
        }
    }
}
