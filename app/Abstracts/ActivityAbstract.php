<?php

namespace App\Abstracts;

use Telegram\Bot\Objects\Update;

abstract class ActivityAbstract
{
    public function itCanRun(Update $update): bool
    {
        if (!isset($this->commands)) {
            abort(505);
        }

        if (!isset($update->message))
            return false;

        if (is_array($this->commands) && in_array($update->message->text, $this->commands))
            return true;

        if ((is_string($this->commands) && $update->message->text == $this->commands))
            return true;

        return false;
    }

    abstract public function execute(Update $updates);
}
