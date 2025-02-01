<?php

namespace App\Http\Controllers;




use GuzzleHttp\Promise\Utils;
use App\Services\MangaService;
use App\Services\MangaServicetest;
use Illuminate\Http\Client\Pool;
use App\ViewModels\MangaViewModel;
use Illuminate\Support\Facades\Http;


class MangaController extends Controller
{


    public function __construct(private MangaService $mangaService, private MangaServicetest $mangaServicetest) {}
    public function home()
    {
        $mangaResponses = Utils::unwrap([
            'popularMangas' => $this->mangaService->getPopular(2),
            'recentlyAddedMangas' => $this->mangaService->recentlyAdded(1),
            'lastUpdatedMangas' => $this->mangaService->getLastUpdateMangas(1),
        ]);

        $popularMangasData = json_decode($mangaResponses['popularMangas']->getBody()->getContents(), true)['data'];
        $recentlyAddedMangasData = json_decode($mangaResponses['recentlyAddedMangas']->getBody()->getContents(), true)['data'];
        $lastUpdatedMangasData = $mangaResponses['lastUpdatedMangas'];

        $mangaViewModel = new MangaViewModel($popularMangasData, $lastUpdatedMangasData, $recentlyAddedMangasData);

        return view('home', $mangaViewModel);
    }

    public function test()
    {

        $start = microtime(true);
        $popularMangas = $this->mangaServicetest->getPopular(1);
        $lastMangas = $this->mangaServicetest->getLastUpdateMangas(10);
        $recentlyAdded = $this->mangaServicetest->recentlyAdded(10);


        $mangaViewModel = new MangaViewModel($popularMangas, $lastMangas, $recentlyAdded);

        $end = microtime(true);

        logger("Tiempo de solicitud: " . ($end - $start) . " segundos");

        dump($popularMangas, $lastMangas);
        // return  convert to json


        // $lastMangas = $this->mangaService->getLastUpdateMangas(5);
        // $popularMangas = $this->mangaService->getPopular(5);
        // dump($lastMangas, $popularMangas);
    }
}
