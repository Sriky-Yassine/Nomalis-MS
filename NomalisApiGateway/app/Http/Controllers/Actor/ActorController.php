<?php

namespace App\Http\Controllers\Actor;

use App\Traits\ApiResponser;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\ActorService;
use App\Http\Controllers\Controller;

class ActorController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the actor micro-service
     * @var AuthorService
     */
    public $actorService;

    public function __construct(ActorService $actorService)
    {
        $this->actorService = $actorService;
    }


    /**
     * Get actor data
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        
        return $this->successResponse($this->actorService->obtainActors());
    }


    /**
     * Save an actor data
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        return $this->successResponse($this->actorService->createActor($request->all()));
    }


    /**
     * Show a single actor details
     * @param $actor
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($actor)
    {
        return $this->successResponse($this->actorService->obtainActor($actor));
    }


    /**
     * Update a single actor data
     * @param Request $request
     * @param $actor
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $actor)
    {
        return $this->successResponse($this->actorService->editActor($request->all(), $actor));
    }


    /**
     * Delete a single actor details
     * @param $actor
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($actor)
    {
        return $this->successResponse($this->actorService->deleteActor($actor));
    }
}
