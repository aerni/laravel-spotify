<?php

namespace Aerni\Spotify\Facades;

use Illuminate\Support\Facades\Facade;
use Aerni\Spotify\Clients\SpotifyClient;

class SpotifyClientFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return SpotifyClient::class;
    }
}
