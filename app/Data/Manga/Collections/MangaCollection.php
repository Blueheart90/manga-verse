<?php

namespace App\Data\Manga\Collections;

use App\Data\Manga\MangaData;
use Spatie\LaravelData\Data;

class MangaCollection extends Data
{
    /**
     * @property \App\Data\MangaData[] $data
     */
    public function __construct(
        public array $data
    ) {}

    // public static function fromApiResponse(array $response): self
    // {
    //     // return new self(
    //     //     data: MangaData::collect($response['data'])->toArray()
    //     // );
    // }
}
