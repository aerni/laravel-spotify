<?php

namespace Aerni\Spotify\Tests;

use Aerni\Spotify\SpotifyAuth;

class SpotifyAuthTest extends TestCase
{
    public function test_can_get_access_token(): void
    {
        $auth = resolve(SpotifyAuth::class);

        $accessToken = $auth->getAccessToken();

        $this->assertIsString($accessToken);
    }
}
