<?php

namespace App\Services;

use App\Abstracts\ServiceAbstract;
use App\Activities\StartActivity;

class BootBotService extends ServiceAbstract
{
    protected function getActivities(): array
    {
        return [new StartActivity()];
    }
}
