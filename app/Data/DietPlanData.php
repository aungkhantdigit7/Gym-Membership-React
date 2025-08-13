<?php

namespace App\Data;

use Spatie\LaravelData\Data;

/** @typescript */
class DietPlanData extends Data
{
    public function __construct(
        
        public ?int $id,
        public string $name,
        public string $description,
        public float $price,
        public string $plan, // Assuming food_type is a string representing a type
        public int $duration, // Duration in days
        public ?string $created_at = null,
        public ?string $updated_at = null,
    ) {}
    public static function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'plan' => ['required', 'string', 'max:255'],
            'duration' => ['required', 'integer', 'min:1'],
        ];
    }
}
