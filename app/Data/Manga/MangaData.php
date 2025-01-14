<?php

namespace App\Manga\Data;

use App\Data\Manga\MangaAttributesData;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;

class MangaData extends Data
{
    /**
     * @property \App\Data\RelationshipData[] $relationships
     */
    public function __construct(
        public string $id,
        public string $type,
        #[MapName('attributes')]
        public MangaAttributesData $attributes,
        public array $relationships,

    ) {}

    public function getCoverUrl(): ?string
    {
        $coverArt = collect($this->relationships)
            ->firstWhere('type', 'cover_art');

        return $coverArt ?
            "https://uploads.mangadex.org/covers/{$this->id}/{$coverArt['attributes']['fileName']}"
            : null;
    }

    public function getAuthor(): string
    {
        $author = collect($this->relationships)
            ->firstWhere('type', 'author');
        return $author['attributes']['name'] ?? 'Desconocido';
    }
}
