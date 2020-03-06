<?php

namespace Aerni\Spotify\Providers;

use Aerni\Spotify\Spotify;
use Aerni\Spotify\SpotifyAuth;
use Aerni\Spotify\SpotifyRequest;
use Illuminate\Support\ServiceProvider;

class SpotifyServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Spotify::class, function () {
            $defaultConfig = [
                'country' => config('spotify.default_config.country'),
                'locale' => config('spotify.default_config.locale'),
                'market' => config('spotify.default_config.market'),
            ];

            return new Spotify($defaultConfig);
        });

        $this->app->singleton(SpotifyAuth::class, function () {
            $clientId = config('spotify.auth.client_id');
            $clientSecret = config('spotify.auth.client_secret');

            return new SpotifyAuth($clientId, $clientSecret);
        });

        $this->app->bind(SpotifyRequest::class, function () {
            $accessToken = $this->app->make(SpotifyAuth::class)->getAccessToken();

            return new SpotifyRequest($accessToken);
        });
    }

    public function boot()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/spotify.php', 'spotify');

        $this->publishes([
            __DIR__.'/../../config/spotify.php' => config_path('spotify.php'),
        ]);
    }
}
