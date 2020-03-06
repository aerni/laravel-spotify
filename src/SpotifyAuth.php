<?php

namespace Aerni\Spotify;

use Aerni\Spotify\Exceptions\SpotifyAuthException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Carbon;
use SpotifyClient;

class SpotifyAuth
{
    private const SPOTIFY_API_TOKEN_URL = 'https://accounts.spotify.com/api/token';

    private $clientId;
    private $clientSecret;

    private $accessToken;
    private $tokenType;
    private $expirationDate;
    private $scope;

    public function __construct($clientId, $clientSecret)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
    }

    /**
     * Generate the access token that will be used to make request to the Spotify API.
     *
     * @throws SpotifyAuthException
     */
    private function generateAccessToken(): void
    {
        try {
            $response = SpotifyClient::post(self::SPOTIFY_API_TOKEN_URL, [
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                    'Accepts' => 'application/json',
                    'Authorization' => 'Basic '.base64_encode($this->clientId.':'.$this->clientSecret),
                ],
                'form_params' => [
                    'grant_type' => 'client_credentials',
                ],
            ]);
        } catch (RequestException $e) {
            $errorResponse = json_decode($e->getResponse()->getBody()->getContents());
            $status = $e->getCode();
            $message = $errorResponse->error_description;

            throw new SpotifyAuthException($message, $status, $errorResponse);
        }

        $body = json_decode((string) $response->getBody());

        $this->accessToken = $body->access_token;
        $this->tokenType = $body->token_type;
        $this->expirationDate = Carbon::now()->addSeconds($body->expires_in);
        $this->scope = $body->scope;
    }

    /**
     * Get the access token.
     *
     * @return string
     * @throws SpotifyAuthException
     */
    public function getAccessToken(): string
    {
        if (! $this->accessTokenIsSet()) {
            $this->generateAccessToken();
        }

        if ($this->accessTokenIsExpired()) {
            $this->generateAccessToken();
        }

        return $this->accessToken;
    }

    /**
     * Check if the access token is expired.
     *
     * @return bool
     */
    private function accessTokenIsExpired(): bool
    {
        if (isset($this->expirationDate) && $this->expirationDate->isPast()) {
            return true;
        }

        return false;
    }

    /**
     * Check if the access token is set.
     *
     * @return bool
     */
    private function accessTokenIsSet(): bool
    {
        if (isset($this->accessToken)) {
            return true;
        }

        return false;
    }
}
