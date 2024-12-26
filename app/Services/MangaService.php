<?php

namespace App\Services;

use Illuminate\Support\Arr;

use function Illuminate\Log\log;

class MangaService
{


   public function __construct(
      private FetchService $fetchService,
      private string $baseUrl = 'https://api.mangadex.org',
   ) {}

   /**
    * Retrieves a list of popular manga based on the provided limit.
    *
    * @param int $limit The maximum number of manga to retrieve (default: 10)
    * @throws \Exception If an error occurs during the request
    * @return \Illuminate\Http\JsonResponse A JSON response containing the list of popular manga or an error message
    */
   public function getPopular(int $limit = 10)
   {
      $queryParams = [
         'limit' => $limit,
         'hasAvailableChapters' => 'true',
         'order' => ['followedCount' => 'desc'],
      ];

      try {
         $data = $this->fetchService->request($this->baseUrl . '/manga', 'GET', $queryParams);

         return response()->json($data);
      } catch (\Exception $e) {
         return response()->json(['error' => $e->getMessage()], 500);
      }
   }

   function getLastUpdateChapters(int $limit = 24)
   {
      $queryParams = [
         'includes' => ['scanlation_group'],
         'contentRating' => ['safe', 'suggestive', 'erotica'], // Laravel codifica  a 'contentRating[]=safe&contentRating[]=suggestive&contentRating[]=erotica'
         'order[readableAt]' => 'desc',
         'limit' => $limit,
      ];

      try {
         $data = $this->fetchService->request($this->baseUrl . '/chapter', 'GET', $queryParams);

         return response()->json($data);
      } catch (\Exception $e) {
         return response()->json(['error' => $e->getMessage()], 500);
      }
   }

   function getLastUpdateMangas(int $limit = 24)
   {

      $chapters = $this->getLastUpdateChapters($limit)->getData(true)['data'];

      $mangaIds = collect($chapters)
         ->pluck('relationships')
         ->flatten(1)
         ->where('type', 'manga')
         ->pluck('id')->toArray();


      $queryParams = [
         'includes' => ['cover_art'],
         'ids' => $mangaIds,
         'contentRating' => ['safe', 'suggestive', 'erotica', 'pornographic'], // Laravel codifica  a 'contentRating[]=safe&contentRating[]....etc
         'limit' => $limit,
      ];

      dump($queryParams);

      try {
         $data = $this->fetchService->request($this->baseUrl . '/manga', 'GET', $queryParams);

         return response()->json($data);
      } catch (\Exception $e) {
         return response()->json(['error' => $e->getMessage()], 500);
      }
   }
}
