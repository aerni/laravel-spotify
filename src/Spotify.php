<?php

namespace Aerni\Spotify;

use Aerni\Spotify\Traits\AlbumsTrait;
use Aerni\Spotify\Traits\ArtistsTrait;
use Aerni\Spotify\Traits\BrowseTrait;
use Aerni\Spotify\Traits\HelpersTrait;
use Aerni\Spotify\Traits\PlaylistsTrait;
use Aerni\Spotify\Traits\SearchTrait;
use Aerni\Spotify\Traits\TracksTrait;

class Spotify
{
    use AlbumsTrait,
        ArtistsTrait,
        BrowseTrait,
        HelpersTrait,
        PlaylistsTrait,
        SearchTrait,
        TracksTrait;

    private $defaultConfig;

    public function __construct(array $defaultConfig)
    {
        foreach ($defaultConfig as $key => $value) {
            $this->defaultConfig[$key] = $this->emptyStringToNull($value);
        }
    }
}
