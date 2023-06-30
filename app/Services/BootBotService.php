<?php

namespace App\Services;

use App\Abstracts\ServiceAbstract;
use App\Activities\BootActivity;

class BootBotService extends ServiceAbstract
{
    protected function getActivities(): array
    {
        return [new BootActivity()];
    }
}
