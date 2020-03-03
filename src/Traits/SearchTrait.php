<?php

namespace Aerni\Spotify\Traits;

use Aerni\Spotify\PendingRequest;

trait SearchTrait
{
    /**
     * Get Spotify Catalog information about artists, albums, tracks or playlists that match a keyword string.
     *
     * @param string $query
     * @param array|string $type
     * @return PendingRequest
     */
    public function searchItems(string $query, $type): PendingRequest
    {
        $endpoint = '/search/';

        $acceptedParams = [
            'q' => $query,
            'type' => $this->validateArgument('type', $type),
            'market' => $this->defaultConfig['market'],
            'limit' => null,
            'offset' => null,
            'include_external' => null,
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Get Spotify Catalog information about albums that match a keyword string.
     *
     * @param string $query
     * @return PendingRequest
     */
    public function searchAlbums(string $query): PendingRequest
    {
        $endpoint = '/search/';

        $acceptedParams = [
            'q' => $query,
            'type' => 'album',
            'market' => $this->defaultConfig['market'],
            'limit' => null,
            'offset' => null,
            'include_external' => null,
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Get Spotify Catalog information about artists that match a keyword string.
     *
     * @param string $query
     * @return PendingRequest
     */
    public function searchArtists(string $query): PendingRequest
    {
        $endpoint = '/search/';

        $acceptedParams = [
            'q' => $query,
            'type' => 'artist',
            'market' => $this->defaultConfig['market'],
            'limit' => null,
            'offset' => null,
            'include_external' => null,
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Get Spotify Catalog information about playlists that match a keyword string.
     *
     * @param string $query
     * @return PendingRequest
     */
    public function searchPlaylists(string $query): PendingRequest
    {
        $endpoint = '/search/';

        $acceptedParams = [
            'q' => $query,
            'type' => 'playlist',
            'market' => $this->defaultConfig['market'],
            'limit' => null,
            'offset' => null,
            'include_external' => null,
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Get Spotify Catalog information about tracks that match a keyword string.
     *
     * @param string $query
     * @return PendingRequest
     */
    public function searchTracks(string $query): PendingRequest
    {
        $endpoint = '/search/';

        $acceptedParams = [
            'q' => $query,
            'type' => 'track',
            'market' => $this->defaultConfig['market'],
            'limit' => null,
            'offset' => null,
            'include_external' => null,
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }
}
