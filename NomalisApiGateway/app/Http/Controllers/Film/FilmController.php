<?php

namespace App\Http\Controllers\Film;


use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Services\FilmService;
use App\Services\ActorService;
use App\Http\Controllers\Controller;

class FilmController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the films micro-service
     * @var FilmService
     */
    public $filmService;

    /**
     *  The service to consume the actors micro-service
     * @var $actorService;
     */
    public $actorService;

    public function __construct(FilmService $filmService, ActorService $actorService)
    {
        $this->filmService = $filmService;
        $this->actorService = $actorService;
    }


    /**
     * Get Film data
     * @return FilmController|JsonResponse
     */
    public function index()
    {
        return $this->successResponse($this->filmService->obtainFilms());
    }


    /**
     * Save an film data
     * @param Request $request
     * @return FilmController|JsonResponse
     */
    public function store(Request $request)
    {
      //  $result = array();
        if (isset($request->actors)) {
            foreach ($request->actors as $actor) {
           //$result[]=$this->actorService->obtainActor($actor['id']);
                $this->actorService->obtainActor($actor['id']);
//                if(http_response_code()){
//                    return $this->errorResponse('no actor found ',404);
//                }
            }
        }

        return $this->successResponse($this->filmService->createFilm($request->all()));

    }
    public function filmsByYear($year){
        return $this->successResponse($this->filmService->obtainFilmsByYear($year));
    }

    public function actorsByFilmId($film)
    {
        //dd(json_decode($this->filmService->obtainFilm($film))->data->actors);
        return $this->successResponse(json_decode($this->filmService->obtainFilm($film))->data->actors);
    }

    /**
     * Show a single film details
     * @param $film
     * @return FilmController|JsonResponse
     */
    public function show($film)
    {
        return $this->successResponse($this->filmService->obtainFilm($film));
    }


    /**
     * Update a single film data
     * @param Request $request
     * @param $film
     * @return FilmController|JsonResponse
     */
    public function update(Request $request, $film)
    {
        if (isset($request->actors)) {
            foreach ($request->actors as $actor) {
                $this->actorService->obtainActor($actor['id']);

            }
        }
        return $this->successResponse($this->filmService->editFilm($request->all(), $film));
    }


    /**
     * Delete a single film details
     * @param $film
     * @return FilmController|JsonResponse
     */
    public function destroy($film)
    {
        return $this->successResponse($this->filmService->deleteFilm($film));
    }
}
