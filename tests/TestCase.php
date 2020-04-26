<?php

namespace Aerni\Spotify\Tests;

use Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function getEnvironmentSetUp($app): void
    {
        // Load the .env file
        $app->useEnvironmentPath(__DIR__.'/..');
        $app->bootstrapWith([LoadEnvironmentVariables::class]);
        parent::getEnvironmentSetUp($app);

        // Set the config with the provided .env variables
        $app['config']->set('spotify', [
            'auth' => [
                'client_id' => env('SPOTIFY_CLIENT_ID'),
                'client_secret' => env('SPOTIFY_CLIENT_SECRET'),
            ],
            'default_config' => [
                'country' => env('SPOTIFY_DEFAULT_COUNTRY', ''),
                'locale' => env('SPOTIFY_DEFAULT_LOCALE', ''),
                'market' => env('SPOTIFY_DEFAULT_MARKET', ''),
            ],
        ]);
    }

    protected function getPackageProviders($app): array
    {
        return [
            'Aerni\Spotify\Providers\SpotifyClientServiceProvider',
            'Aerni\Spotify\Providers\SpotifyServiceProvider',
        ];
    }

    protected function getPackageAliases($app): array
    {
        return [
            'SpotifyClient' => 'Aerni\Spotify\Facades\SpotifyClientFacade',
            'Spotify' => 'Aerni\Spotify\Facades\\SpotifyFacade',
            'SpotifySeed' => 'Aerni\Spotify\Facades\\SpotifySeedFacade',
        ];
    }
}
