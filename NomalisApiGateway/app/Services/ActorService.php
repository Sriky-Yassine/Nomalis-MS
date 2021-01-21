<?php

namespace App\Services;

use App\Traits\ConsumeExternalService;

class ActorService
{
    use ConsumeExternalService;

    /**
     * The base uri to consume actors service
     * @var string
     */
    public $baseUri;

    /**
     * Authorization secret to pass to actor api
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.actors.base_uri');
        $this->secret = config('services.actors.secret');
    }


    /**
     * Obtain the full list of actor from the actor service
     */
    public function obtainActors()
    {
        return $this->performRequest('GET', '/api/actor');
    }

    /**
     * Create Actor
     */
    public function createActor($data)
    {
        return $this->performRequest('POST', '/api/actor', $data);
    }

    /**
     * Get a single actor data
     */
    public function obtainActor($actor)
    {
        return $this->performRequest('GET', "/api/actor/{$actor}");
    }

    /**
     * Edit a single actor data
     */
    public function editActor($data, $actor)
    {
        return $this->performRequest('PUT', "/api/actor/{$actor}", $data);
    }

    /**
     * Delete an Actor
     */
    public function deleteActor($actor)
    {
        return $this->performRequest('DELETE', "/api/actor/{$actor}");
    }
}
