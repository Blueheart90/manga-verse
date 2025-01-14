<?php

namespace App\Data\Manga;

use Spatie\LaravelData\Data;

class RelationshipData extends Data
{
    public function __construct(
        public string $id,
        public string $type,
        public ?array $attributes = null,
    ) {}
}
