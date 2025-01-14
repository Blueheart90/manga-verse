<?php

namespace App\Data\Manga;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\WithCast;
use Illuminate\Support\Carbon;

class MangaAttributesData extends Data
{
    public function __construct(
        public array $title,
        public array $altTitles,
        public array $description,
        public array $links,
        public string $originalLanguage,
        public string $lastVolume,
        public string $lastChapter,
        public string $publicationDemographic,
        public string $status,
        #[WithCast(Carbon::class)]
        public Carbon $createdAt,
        #[WithCast(Carbon::class)]
        public Carbon $updatedAt,
        public ?string $year = null,
        public ?string $contentRating = null,
        public array $tags = [],
        public string $state = 'published',
        public bool $chapterNumbersResetOnNewVolume = false,
        public array $availableTranslatedLanguages = [],
        public ?string $latestUploadedChapter = null
    ) {}

    public function getTitle(): string
    {
        return $this->title['es'] ?? array_values($this->title)[0] ?? 'Sin título';
    }

    public function getDescription(): string
    {
        return $this->description['es'] ?? array_values($this->description)[0] ?? 'Sin descripción';
    }

    public function getTags(): array
    {
        return collect($this->tags)
            ->map(fn($tag) => $tag['attributes']['name']['es'] ?? array_values($tag['attributes']['name'])[0])
            ->toArray();
    }
}
