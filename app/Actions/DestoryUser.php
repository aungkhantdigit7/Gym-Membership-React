<?php

namespace App\Actions;

use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class DestoryUser
{
    use AsAction;

    protected $withEmail = false;

    public function handle(int|string $user)
    {
        // Logic to destroy a user by ID
        if ($this->withEmail) {
            // Logic to send email notification before deletion
            $user = User::query()->where('email', $user)->first();
            if (!$user) {
                throw new \InvalidArgumentException('User not found with the provided email.');
            }
        }else {
            // Logic to delete without email notification
            $user = User::findOrFail($user);
        }
        $user->delete();
    }

    public function asController(int $userId)
    {
        // Handle the request to destroy a user
        return $this->handle($userId);
    }

    public function htmlResponse()
    {
        return redirect()->route('admin.users.lists')->with('success', 'User deleted successfully.');
    }

    public function withEmail(): static {
        $this->withEmail = true;
        return $this;
    }

    public function asCommand(): static {
        $this->withEmail = false;
        return $this;
    }
}
