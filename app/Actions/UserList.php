<?php

namespace App\Actions;

use App\Models\User;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsAction;

class UserList
{
    use AsAction;
    protected $users = [];

    public function handle(int $perPage = 10): void
    {
        // Fetch users with pagination
        $this->users = User::query()->paginate($perPage);
    }


    public function asController()
    {
        $perPage = (int) request()->input('per_page', 10);

        $this->handle($perPage);
    }
    public function htmlResponse()
    {
        return Inertia::render('Users/List', [
            'users' => $this->users,
        ]);
    }
}
