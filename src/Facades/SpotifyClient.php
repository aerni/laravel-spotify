<?php

namespace Aerni\Spotify\Facades;

use Illuminate\Support\Facades\Facade;

class SpotifyClient extends Facade
{
    public static function getFacadeAccessor()
    {
        return \Aerni\Spotify\Clients\SpotifyClient::class;
    }
}
