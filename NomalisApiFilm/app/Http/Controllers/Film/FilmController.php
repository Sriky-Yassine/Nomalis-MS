<?php

namespace App\Http\Controllers\Film;

use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class FilmController extends Controller
{
    use ApiResponser;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
       $films = Film::all();
       return $this->successResponse($films);
    }


    /**
     * Store a single film information
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $rules = [
            'name'         =>  'required|max:255',
            'year'         =>  'required|min:4',
            'actors'     =>  'required|min:1',
        ];
        $this->validate($request, $rules);

        $film = Film::create($request->all());

        return $this->successResponse($film->id, Response::HTTP_CREATED);
    }
 /**
     * Storing a single film data
     * @param $film
     * @return \Illuminate\Http\JsonResponse
     */
     public function filmsByYear($year)
     {
        // dd(Film::where('year',$year)->get());
         $films = Film::where('year',$year)->get();
         return $this->successResponse($films);
     }

    /**
     * Storing a single film data
     * @param $film
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($film)
    {
        $myFilm = Film::findOrFail($film);
        return $this->successResponse($myFilm);
    }



    /**
     * @param Request $request
     * @param $film
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $film)
    {
        $rules = [
            'name'         =>  'required|max:255',
            'year'         =>  'required|min:4',
            'actors'     =>  'required|min:1',
        ];
        $this->validate($request, $rules);
        $film = Film::findOrFail($film);
        $film->fill($request->all());
        if($film->isClean()){
            return $this->errorResponse("At least one value must change", Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $film->save();
        return $this->successResponse($film);
    }


    /**
     * Delete film information
     * @param $film
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($film)
    {
        $film = Film::findOrFail($film);
        $film->delete();
        return $this->successResponse($film);
    }
}
