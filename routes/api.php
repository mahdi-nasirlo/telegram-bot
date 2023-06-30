<?php

use App\Services\BootBotService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Telegram\Bot\Laravel\Facades\Telegram;


Route::post('/webhook', function (Request $request) {

    $updates = Telegram::getWebhookUpdate();

    $workflow = new BootBotService($updates);

    $workflow->start();
});
