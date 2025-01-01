<?php

namespace Aerni\Spotify;

use Aerni\Spotify\Exceptions\SpotifyApiException;
use GuzzleHttp\Exception\RequestException;
use SpotifyClient;

class SpotifyRequest
{
    private $accessToken;

    private $apiUrl;

    public function __construct(string $accessToken)
    {
        $this->accessToken = $accessToken;
        $this->apiUrl = config('spotify.api_url','https://api.spotify.com/v1');
    }

    /**
     * Make the API request.
     *
     * @throws SpotifyApiException
     */
    public function get(string $endpoint, array $params = []): array
    {
        try {
            $response = SpotifyClient::get($this->apiUrl.$endpoint.'?'.http_build_query($params), [
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
