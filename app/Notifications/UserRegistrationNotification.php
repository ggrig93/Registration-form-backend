<?php

namespace App\Notifications;

use App\Channels\SmsChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserRegistrationNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var string
     */
    public string $phone;

    /**
     * UserRegistrationNotification constructor.
     * @param string $phone
     */
    public function __construct(string $phone)
    {
        $this->phone = $phone;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array
     */
    public function via(): array
    {
        return ['mail', SmsChannel::class];
    }

    /**
     * @param $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->from(config('mail.from.address'))
            ->subject('New user was created')
            ->markdown('mails.user_create',
                [
                    'user' => $notifiable,
                ]);
    }

    /**
     * @param $notifiable
     * @return SmsMessage
     */
    public function toSms($notifiable): SmsMessage
    {
        return (new SmsMessage)
            ->from(config("external-apis.twilio.number_from"))
            ->to($this->phone);
//        ->to(config("external-apis.twilio.number_to"))
    }

}
