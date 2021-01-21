<?php

namespace App\Http\Controllers\Actor;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ActorController extends Controller
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
    * Return full list of actors
    * @return Response
    */
    public function index()
    {
        $actors = Actor::all();
        return $this->successResponse($actors);
    }


    /**
     * Create one new actor
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name'      => 'required|max:254',
        ];

        $this->validate($request, $rules);

        $actor = Actor::create($request->all());

        return $this->successResponse($actor->id, Response::HTTP_CREATED);
    }


    /**
     * Show a specific actor
     * @param Actor $actor
     * @return Response
     */
    public function show($actor)
    {
        $actor = Actor::findOrFail($actor);
        return $this->successResponse($actor);
    }

   
    /**
     * Update actor information
     * @param Request $request
     * @param $actor
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $actor)
    {
        $rules = [
            'name'      => 'max:254',
            'gender'    => 'max:20|in:male,female',
            'country'   => 'max:254',
        ];
        $this->validate($request, $rules);
        $actor = Actor::findOrFail($actor);
        $actor->fill($request->all());
        if($actor->isClean()){
            return $this->errorResponse("Atleast one value must change", Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $actor->save();
        return $this->successResponse($actor);
    }


    /**
     * Delete actor information
     * @param $actor
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($actor)
    {
        $actor = Actor::findOrFail($actor);
        $actor->delete();
        return $this->successResponse($actor);
    }
}
