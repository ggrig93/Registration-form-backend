<?php

namespace App\Notifications;

use Exception;
use Twilio\Exceptions\ConfigurationException;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client;

class SmsMessage
{
    protected string $from;
    protected string $to;
    protected string $sid;
    protected string $token;
    protected string $text;

    /**
     * SmsMessage constructor.
     * @param array $lines
     */
    public function __construct(array $lines = [])
    {
        $this->lines = $lines;

        $this->init();
    }

    private function init()
    {
        $this->sid = config("external-apis.twilio.sid");
        $this->token = config("external-apis.twilio.token");
    }

    /**
     * @param $from
     * @return $this
     */
    public function from($from): static
    {
        $this->from = $from;

        return $this;
    }

    /**
     * @param $to
     * @return $this
     */
    public function to($to): static
    {
        $this->to = $to;

        return $this;
    }

    /**
     * @param $message
     * @return $this
     */
    public function message($message): static
    {
        $this->text = $message;

        return $this;
    }

    /**
     * @throws ConfigurationException
     * @throws TwilioException
     * @throws Exception
     */
    public function send()
    {
        if (!$this->from || !$this->to) {
            throw new Exception('SMS is not correct');
        }

        $client = new Client($this->sid, $this->token);

        $client->messages->create($this->to, [
            'from' => $this->from,
            'body' => 'You have been registered successfully'
        ]);
    }
}
