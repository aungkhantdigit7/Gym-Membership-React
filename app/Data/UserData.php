<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class UserData extends Data
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public ?string $confirmPassword = null,
    ) {}

    public static function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ];
    }
    public function fromModel() {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ];
    }
}
