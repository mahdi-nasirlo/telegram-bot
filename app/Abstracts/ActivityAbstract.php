<?php

namespace App\Abstracts;

abstract class ActivityAbstract
{
    public function itCanRun($update): bool
    {
        if (!isset($this->commands)) {
            abort(505);
        }

        $message = $update['message']['text'];

        if (is_array($this->commands) && in_array($message, $this->commands))
            return true;

        if ((is_string($this->commands) && $message == $this->commands))
            return true;

        return false;
    }

    abstract public function execute($updates);
}
