<?php

namespace App\Data;

use Spatie\LaravelData\Data;

/** @typescript */
class TrainerRequestData extends Data
{
    public function __construct(
        public string $name,
        public string $email,
        public string $phone,
        public string $bio,
        public string $specialization,
    ) {}

    public static function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'bio' => ['required', 'string', 'max:1000'],
            'specialization' => ['required', 'string', 'max:255'],
        ];
    }
}
