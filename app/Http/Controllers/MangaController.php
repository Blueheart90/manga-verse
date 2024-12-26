<?php

namespace App\Http\Controllers;


use GuzzleHttp\HandlerStack;
use Illuminate\Http\Request;
use App\Services\MangaService;
use GuzzleHttp\Handler\CurlHandler;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;

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
        $res = $this->mangaService->getLastUpdateMangas(5);
        dd($res);
        return $res;
    }
}
