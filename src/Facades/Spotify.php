<?php

namespace Aerni\Spotify\Facades;

use Illuminate\Support\Facades\Facade;

class Spotify extends Facade
{
    public static function getFacadeAccessor()
    {
        return \Aerni\Spotify\Spotify::class;
    }
}
