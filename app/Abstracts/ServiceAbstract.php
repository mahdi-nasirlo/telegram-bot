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
        foreach ($this->filterActivity() as $activity) {
            $activity->execute($this->updates);
        }
    }

    public function filterActivity(): array
    {
        return array_filter($this->getActivities(), function ($activity) {
            return $activity->itCanRun($this->updates);
        });
    }

    abstract protected function getActivities();
}
