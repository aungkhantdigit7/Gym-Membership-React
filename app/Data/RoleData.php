<?php

namespace App\Data;

use Spatie\LaravelData\Data;


/** @typescript */
class RoleData extends Data
{
    public function __construct(
        public ?int $id,
        public string $name,
    ) {}
}
