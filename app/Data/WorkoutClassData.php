<?php

namespace App\Data;

use App\Models\WorkoutClass;
use Illuminate\Foundation\Mix;
use Spatie\LaravelData\Data;
use Illuminate\Http\UploadedFile;
use Mockery\Undefined;

/** @typescript */
class WorkoutClassData extends Data
{

    public function __construct(
        public ?int $id,
        public string $name,
        public string $description,
        public float $class_fee,
        public int $duration,
        public int $intensity,
        public int $complexity,
        public mixed $image = null,
        public ?string $created_at = null,
        public ?string $updated_at = null,
    ) {}

    public function fromModel(WorkoutClass $model): self
    {
        return new self(
            id: $model->id,
            name: $model->name,
            description: $model->description,
            class_fee: $model->class_fee,
            duration: $model->duration,
            intensity: $model->intensity,
            complexity: $model->complexity,
            image: $model->getFirstMediaUrl('preview_image'),
            created_at: $model->created_at?->toDateTimeString(),
            updated_at: $model->updated_at?->toDateTimeString(),
        );
    }
}
