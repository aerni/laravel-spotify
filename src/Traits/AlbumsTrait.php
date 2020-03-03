<?php

namespace Aerni\Spotify\Traits;

use Aerni\Spotify\PendingRequest;

trait AlbumsTrait
{
    /**
     * Get Spotify catalog information for a single album.
     *
     * @param string $id
     * @return PendingRequest
     */
    public function album(string $id): PendingRequest
    {
        $endpoint = '/albums/' . $id;

        $acceptedParams = [
            'market' => $this->defaultConfig['market'],
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Get Spotify catalog information about an album’s tracks. Optional parameters can be used to limit the number of tracks returned.
     *
     * @param string $id
     * @return PendingRequest
     */
    public function albumTracks(string $id): PendingRequest
    {
        $endpoint = '/albums/' . $id . '/tracks/';

        $acceptedParams = [
            'limit' => null,
            'offset' => null,
            'market' => $this->defaultConfig['market'],
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Get Spotify catalog information for multiple albums identified by their Spotify IDs.
     *
     * @param array|string $ids
     * @return PendingRequest
     */
    public function albums($ids): PendingRequest
    {
        $endpoint = '/albums/';

        $acceptedParams = [
            'ids' => $this->validateArgument('ids', $ids),
            'market' => $this->defaultConfig['market'],
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }
}
