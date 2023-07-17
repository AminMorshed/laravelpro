<?php

namespace App\Notifications\Channels;

use Ghasedak\Exceptions\ApiException;
use Ghasedak\Exceptions\HttpException;
use Illuminate\Notifications\Notification;

class SmsChannel
{

    public function send($notifiable, Notification $notification): void
    {
        if (!method_exists($notification, 'toGhasedakSms')) {
            throw \Exception('toGhasedakSms not found');
        }

        $data = $notification->toGhasedakSms($notifiable);

        $message = $data['text'];
        $receptor = $data['number'];

        $apikey = config('services.ghasedak.key');

        try {
            $lineNumber = "30005088";
            $api = new \Ghasedak\GhasedakApi($apikey);
            $api->SendSimple($receptor, $message, $lineNumber);
        } catch (ApiException $e) {
            throw $e;
        } catch (HttpException $e) {
            throw $e;
        }
    }

}
