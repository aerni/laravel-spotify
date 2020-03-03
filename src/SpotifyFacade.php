<?php

namespace Aerni\Spotify;

use Illuminate\Support\Facades\Facade;

class SpotifyFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return Spotify::class;
    }
}
