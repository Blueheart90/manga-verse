<?php

namespace App\Http\Controllers;


use App\Data\MangaData;
use GuzzleHttp\HandlerStack;
use Illuminate\Http\Request;
use App\Services\MangaService;
use GuzzleHttp\Handler\CurlHandler;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Http;

class MangaController extends Controller
{


    public function __construct(private MangaService $mangaService) {}
    public function home()
    {
        $start = microtime(true);
        $popularMangas = $this->mangaService->getPopular(1);

        $end = microtime(true);

        Log::info("Tiempo de solicitud: " . ($end - $start) . " segundos");
        return $popularMangas;
    }

    public function test()
    {
        $lastMangas = $this->mangaService->getLastUpdateMangas(5);
        $popularMangas = $this->mangaService->getPopular(5);
        dump($lastMangas, $popularMangas);

        // Log::info($response);
        // $mangas = MangaData::collect(
        //     collect($response)->map(function ($manga) {
        //         return [
        //             'id' => $manga['id'],
        //             'type' => $manga['type'],
        //             'title' => $manga['attributes']['title'] ?? [],
        //         ];
        //     })
        // );

        //return $mangas;
    }
}
