<?php

namespace App\Data;

use Spatie\LaravelData\Data;

/** @typescript */
class TrainerData extends Data
{
    public function __construct(
        //
        public ?int $id,
        public string $name,
        public string $email,
        public int $user_id,
        public ?string $phone = null,
        public ?string $bio = null,
        public ?string $specialization = null,
        public ?string $created_at,
        public ?string $updated_at,
    ) {}

    public static function rules(): array
    {
        return [
            'id' => 'nullable|integer',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'user_id' => 'required|integer',
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string|max:500',
            'specialization' => 'nullable|string|max:100',
            'created_at' => 'nullable|date_format:Y-m-d H:i:s',
            'updated_at' => 'nullable|date_format:Y-m-d H:i:s',
        ];
    }

    public function fromModel($model): self
    {
        return new self(
            id: $model->id,
            name: $model->name,
            email: $model->email,
            user_id: $model->user_id,
            phone: $model->phone,
            bio: $model->bio,
            specialization: $model->specialization,
            created_at: $model->created_at->toDateTimeString(),
            updated_at: $model->updated_at?->toDateTimeString(),
        );
    }
}
