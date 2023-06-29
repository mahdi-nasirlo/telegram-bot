<?php

namespace App\Workflows;

use App\Activities\BootActivity;
use Generator;
use Workflow\ActivityStub;
use Workflow\Workflow;

class BootBotWorkflow extends Workflow
{
    public function execute(): Generator
    {
        yield ActivityStub::make(BootActivity::class);
    }
}
