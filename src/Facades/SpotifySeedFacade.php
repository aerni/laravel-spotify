<?php

namespace Aerni\Spotify\Facades;

use Aerni\Spotify\SpotifySeed;
use Illuminate\Support\Facades\Facade;

class SpotifySeedFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return SpotifySeed::class;
    }
}
