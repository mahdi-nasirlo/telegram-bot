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
            'reply_markup' => $this->getInlineKeyboard(),
        ]);
    }

    public function getInlineKeyboard(): bool|string
    {
        $keyboard = [];

        $lineOne = [
            [
                'text' => 'تنظیمات گروه',
                'callback_data' => '0'
            ],
        ];

        $lineTwo = [
            [
                'text' => 'افزودن ربات به گروه ✖️',
                'url' => "https://t.me/" . config('telegram.bots.mybot.user_name') . "?startgroup=new"
            ],
        ];

        if (filter_var(config('telegram.bots.mybot.group_support_url'), FILTER_VALIDATE_URL))
            $lineOne[] = [
                'text' => 'گروه پشتیبانی',
                'url' => config('telegram.bots.mybot.group_support_url')
            ];

        $lineThree = [
            [
                'text' => 'اصل سراسری',
                'callback_data' => '1'
            ],
        ];

        $lineFour = [
            [
                'text' => 'بزرگترین لینکدونی',
                'callback_data' => '2'
            ],
            [
                'text' => 'راهنمای ربات',
                'callback_data' => '3'
            ],
        ];

        $keyboard = [
            $lineOne,
            $lineTwo,
            $lineThree,
            $lineFour,
        ];

        return json_encode(['inline_keyboard' => $keyboard]);
    }
}

