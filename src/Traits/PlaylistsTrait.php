<?php

namespace Aerni\Spotify\Traits;

use Aerni\Spotify\PendingRequest;

trait PlaylistsTrait
{
    /**
     * Get the current image associated with a specific playlist.
     *
     * @param string $id
     * @return PendingRequest
     */
    public function playlistCoverImage(string $id): PendingRequest
    {
        $endpoint = '/playlists/' . $id . '/images/';

        return new PendingRequest($endpoint);
    }

    /**
     * Get a playlist owned by a Spotify user.
     *
     * @param string $id
     * @return PendingRequest
     */
    public function playlist(string $id): PendingRequest
    {
        $endpoint = '/playlists/' . $id;

        $acceptedParams = [
            'fields' => null,
            'market' => $this->defaultConfig['market'],
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Get full details of the tracks of a playlist owned by a Spotify user.
     *
     * @param string $id
     * @return PendingRequest
     */
    public function playlistTracks(string $id): PendingRequest
    {
        $endpoint = '/playlists/' . $id . '/tracks/';

        $acceptedParams = [
            'fields' => null,
            'limit' => null,
            'offset' => null,
            'market' => $this->defaultConfig['market'],
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }
}
