<?php

namespace App\Activities;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Workflow\Activity;

class BootActivity extends Activity
{
    public function execute()
    {
        User::factory()->create();
        return 'activity';
    }
}

