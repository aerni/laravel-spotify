<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication
    |--------------------------------------------------------------------------
    |
    | The Client ID and Client Secret of your Spotify App.
    |
    */

    'auth' => [
        'client_id' => env('SPOTIFY_CLIENT_ID'),
        'client_secret' => env('SPOTIFY_CLIENT_SECRET'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Config
    |--------------------------------------------------------------------------
    |
    | You may provide a default config which will be used for every API request.
    |
    */

    'default_config' => [
        'country' => env('SPOTIFY_DEFAULT_COUNTRY', ''),
        'locale' => env('SPOTIFY_DEFAULT_LOCALE', ''),
        'market' => env('SPOTIFY_DEFAULT_MARKET', ''),
    ],

];
