<?php

namespace App\Services;

use App\Traits\ConsumeExternalService;

class FilmService
{
    use ConsumeExternalService;

    /**
     * The base uri to consume films service
     * @var string
     */
    public $baseUri;

    /**
     * Authorization secret to pass to film api
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.films.base_uri');
        $this->secret = config('services.films.secret');
    }

    public function obtainFilms()
    {
        return $this->performRequest('GET', '/api/film');
    }


    public function createFilm($data)
    {
        return $this->performRequest('POST', '/api/film', $data);
    }

    public function obtainFilm($film)
    {
        return $this->performRequest('GET', "/api/film/{$film}");
    }
    public function obtainFilmsByYear($year)
    {
        return $this->performRequest('GET', "/api/film/year/{$year}");
    }

    public function obtainFilmByDate($year)
    {
        return $this->performRequest('GET', "/api/film/year/{$year}");
    }
    public function editFilm($data, $film)
    {
        return $this->performRequest('PUT', "/api/film/{$film}", $data);
    }

    public function deleteFilm($film)
    {
        return $this->performRequest('DELETE', "/api/film/{$film}");
    }
}
