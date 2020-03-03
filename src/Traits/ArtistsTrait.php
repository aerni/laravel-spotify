<?php

namespace Aerni\Spotify\Traits;

use Aerni\Spotify\PendingRequest;

trait ArtistsTrait
{
    /**
     * Get Spotify catalog information for a single artist identified by their unique Spotify ID.
     *
     * @param string $id
     * @return PendingRequest
     */
    public function artist(string $id): PendingRequest
    {
        $endpoint = '/artists/' . $id;

        return new PendingRequest($endpoint);
    }

    /**
     * Get Spotify catalog information about an artist’s albums. Optional parameters can be specified in the query string to filter and sort the response.
     *
     * @param string $id
     * @return PendingRequest
     */
    public function artistAlbums(string $id): PendingRequest
    {
        $endpoint = '/artists/' . $id . '/albums/';

        $acceptedParams = [
            'include_groups' => null,
            'country' => $this->defaultConfig['country'],
            'limit' => null,
            'offset' => null,
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Get Spotify catalog information about an artist’s top tracks by country.
     *
     * @param string $id
     * @return PendingRequest
     */
    public function artistTopTracks(string $id): PendingRequest
    {
        $endpoint = '/artists/' . $id . '/top-tracks/';

        $acceptedParams = [
            'country' => $this->defaultConfig['country'],
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Get Spotify catalog information about artists similar to a given artist. Similarity is based on analysis of the Spotify community’s listening history.
     *
     * @param string $id
     * @return PendingRequest
     */
    public function artistRelatedArtists(string $id): PendingRequest
    {
        $endpoint = '/artists/' . $id . '/related-artists/';

        return new PendingRequest($endpoint);
    }

    /**
     * Get Spotify catalog information for several artists based on their Spotify IDs.
     *
     * @param array|string $ids
     * @return PendingRequest
     */
    public function artists($ids): PendingRequest
    {
        $endpoint = '/artists/';

        $acceptedParams = [
            'ids' => $this->validateArgument('ids', $ids),
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }
}
