<?php

namespace Aerni\Spotify\Tests;

use Aerni\Spotify\SpotifyRequest;

class SpotifyRequestTest extends TestCase
{
    public function test_can_make_request_and_get_response(): void
    {
        $request = resolve(SpotifyRequest::class);

        $response = $request->get('/tracks/35GACeX8Zl55jp29xFbvvo');

        $this->assertIsArray($response);
    }
}
