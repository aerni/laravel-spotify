<?php

namespace Aerni\Spotify\Tests;

use Aerni\Spotify\Exceptions\SpotifyApiException;
use Aerni\Spotify\Exceptions\SpotifyAuthException;
use Aerni\Spotify\SpotifyAuth;
use Aerni\Spotify\SpotifyRequest;
use Spotify;

class SpotifyExceptionTest extends TestCase
{
    public function test_can_throw_auth_exception(): void
    {
        $auth = new SpotifyAuth('123', '123');

        $this->expectException(SpotifyAuthException::class);
        $this->expectExceptionMessage('invalid_client');

        $auth->getAccessToken();
    }

    public function test_can_throw_api_exception(): void
    {
        $request = resolve(SpotifyRequest::class);

        $this->expectException(SpotifyApiException::class);
        $this->expectExceptionMessage('Service not found');

        $request->get('/not-existing-endpoint');
    }

    public function test_can_get_api_response_from_exception(): void
    {
        try {
            Spotify::track('6RTOAaQeVkm1GUTqY0hjp')->get();
        } catch (SpotifyApiException $e) {
            $apiResponse = $e->getApiResponse();
        }

        $this->assertObjectHasAttribute('error', $apiResponse);
    }
}
