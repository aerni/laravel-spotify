<?php

namespace Aerni\Spotify\Providers;

use Illuminate\Support\ServiceProvider;
use Aerni\Spotify\Clients\SpotifyClient;

class SpotifyClientServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(SpotifyClient::class, function () {
            return new SpotifyClient();
        });
    }
}
