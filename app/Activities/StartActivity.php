<?php

namespace App\Activities;

use App\Abstracts\ActivityAbstract;
use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\Objects\Update;

class StartActivity extends ActivityAbstract
{
    protected $commands = [
        '/start',
        'پنل',
        'panel',
    ];

    public function execute(Update $updates): void
    {
        $textData = [
            'userName' => $updates->message->from->username . $updates->message->from->lastName,
            'userId' => $updates->message->from->id,
        ];

        $text = view('activities.start', $textData)->render();

        Telegram::sendMessage([
            'chat_id' => $updates->message->chat->id,
            'text' => $text,
            'parse_mode' => 'HTML',
        ]);
    }
}

