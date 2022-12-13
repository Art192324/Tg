<?php

namespace App\Http\Controllers;

use App\Http\Services\NotificatorInterface;
use Illuminate\Http\Request;

use App\Notifications\TgNotification;
use Illuminate\Support\Facades\Notification;
use NotificationChannels\Telegram\Telegram;

class TgController extends Controller
{
    public function index(NotificatorInterface $notificator)
    {

        Notification::send(auth()->user(), $notificator);
    }
}
