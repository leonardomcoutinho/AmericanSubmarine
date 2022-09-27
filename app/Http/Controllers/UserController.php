<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use NotificationChannels\Telegram\TelegramChannel;
use Illuminate\Support\Facades\Config;
use App\Notifications\TelegramNotific;
use Illuminate\Support\Facades\Notification;
use App\Models\Notice;
use Illuminate\Notifications\Notifiable;
use App\Notifications\TelegramNotification;
use Ramsey\Uuid\Uuid;


class UserController extends Controller
{
    public function usuarios(){
        $usuarios = User::all();
        
        return view('users.usuario', ['usuarios'=>$usuarios]);
    }
}
