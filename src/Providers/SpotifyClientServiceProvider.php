<?php

namespace Aerni\Spotify\Providers;

use Aerni\Spotify\Clients\SpotifyClient;
use Illuminate\Support\ServiceProvider;

class SpotifyClientServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(SpotifyClient::class, function () {
            return new SpotifyClient();
        });
    }
}
