<?php

return [
    'actors'   =>  [
        'base_uri'  =>  env('ACTORS_SERVICE_BASE_URL'),
        'secret'  =>  env('ACTORS_SERVICE_SECRET'),
    ],

    'films'   =>  [
        'base_uri'  =>  env('FILMS_SERVICE_BASE_URL'),
        'secret'  =>  env('FILMS_SERVICE_SECRET'),
    ],
];
