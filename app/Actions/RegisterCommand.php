<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Facades\Actions;

class RegisterCommand
{
    use AsAction;

    public function handle()
    {
        // ...
        Actions::registerCommands('app/Actions');
    }
}
