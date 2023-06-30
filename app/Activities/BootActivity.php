<?php

namespace App\Activities;

use App\Abstracts\ActivityAbstract;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Laravel\Facades\Telegram;

class BootActivity extends ActivityAbstract
{
    protected array|string|null $commands;

    public function execute($updates): void
    {
        User::factory()->create();

        Log::info($updates['message']);

        Telegram::sendMessage([
            'chat_id' => $updates['message']['chat']['id'],
            'text' => 'Hello, I\'m a bot. I can help you with your tasks.',
        ]);
    }
}

