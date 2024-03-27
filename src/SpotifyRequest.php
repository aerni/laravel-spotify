<?php

namespace Aerni\Spotify;

use Aerni\Spotify\Exceptions\SpotifyApiException;
use GuzzleHttp\Exception\RequestException;
use SpotifyClient;

class SpotifyRequest
{
    private const SPOTIFY_API_URL = 'https://api.spotify.com/v1';

    private $accessToken;

    public function __construct(string $accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * Make the API request.
     *
     * @throws SpotifyApiException
     */
    public function get(string $endpoint, array $params = []): array
    {
        try {
            $response = SpotifyClient::get(self::SPOTIFY_API_URL.$endpoint.'?'.http_build_query($params), [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accepts' => 'application/json',
                    'Authorization' => 'Bearer '.$this->accessToken,
                ],
            ]);
        } catch (RequestException $e) {
            $errorResponse = $e->getResponse();
            $status = $errorResponse->getStatusCode();

            $message = $errorResponse->getReasonPhrase();

            throw new SpotifyApiException($message, $status, $errorResponse);
        }

        return json_decode((string) $response->getBody(), true);
    }
}
