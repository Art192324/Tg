<?php

namespace App\Notifications;
use App\Http\Services\NotificatorInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramFile;
use NotificationChannels\Telegram\TelegramLocation;
use NotificationChannels\Telegram\TelegramMessage;

class TgNotification extends Notification implements NotificatorInterface
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

         public function toTelegram($notifiable)
    {
        return TelegramFile::create()
            ->content('Awesome *bold* text and [inline URL](http://www.example.com/)')
            ->file(public_path('/Server/rrr.png'), 'photo'); // local photo
        // OR using a helper method with or without a remote file.
        // ->photo('https://file-examples-com.github.io/uploads/2017/10/file_example_JPG_1MB.jpg');
    }

}
