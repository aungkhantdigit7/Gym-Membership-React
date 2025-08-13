<?php

namespace App\Actions;

use App\Data\UserData;
use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateUser
{
    use AsAction;

    public function handle(UserData $data)
    {
        $user = User::create($data->toArray());

        return $user;
    }
}
