<?php

use App\Workflows\BootBotWorkflow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Workflow\WorkflowStub;


Route::get('/webhook', function (Request $request) {
    $workflow = WorkflowStub::make(BootBotWorkflow::class);

    $workflow->start();

    return response()->json([
        'id' => $workflow->id(),
        'status' => $workflow->status()
    ]);
});
