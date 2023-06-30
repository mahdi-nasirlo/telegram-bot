<?php

namespace App\Abstracts;

abstract class ServiceAbstract
{
    protected $updates;

    public function __construct($updates)
    {
        $this->updates = $updates;
    }

    public function start(): void
    {
        foreach ($this->getActivities() as $activity) {
            $activity->run($this->updates);
        }
    }

    abstract protected function getActivities();
}
