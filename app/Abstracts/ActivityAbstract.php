<?php

namespace App\Abstracts;

abstract class ActivityAbstract
{
    protected array|string|null $commands;

    public function run($update): void
    {
        $this->execute($update);
    }

    abstract public function execute($updates);
}
