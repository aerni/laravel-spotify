<?php

namespace Aerni\Spotify\Traits;

use Aerni\Spotify\PendingRequest;
use Aerni\Spotify\SpotifySeed;

trait BrowseTrait
{
    /**
     * Get a single category used to tag items in Spotify (on, for example, the Spotify player’s “Browse” tab).
     *
     * @param string $id
     * @return PendingRequest
     */
    public function category(string $id): PendingRequest
    {
        $endpoint = '/browse/categories/' . $id;

        $acceptedParams = [
            'country' => $this->defaultConfig['country'],
            'locale' => $this->defaultConfig['locale'],
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Get a list of Spotify playlists tagged with a particular category.
     *
     * @param string $id
     * @return PendingRequest
     */
    public function categoryPlaylists(string $id): PendingRequest
    {
        $endpoint = '/browse/categories/' . $id . '/playlists/';

        $acceptedParams = [
            'country' => $this->defaultConfig['country'],
            'limit' => null,
            'offset' => null,
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Get a list of categories used to tag items in Spotify (on, for example, the Spotify player’s “Browse” tab).
     *
     * @return PendingRequest
     */
    public function categories(): PendingRequest
    {
        $endpoint = '/browse/categories/';

        $acceptedParams = [
            'country' => $this->defaultConfig['country'],
            'locale' => $this->defaultConfig['locale'],
            'limit' => null,
            'offset' => null,
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Get a list of Spotify featured playlists (shown, for example, on a Spotify player’s ‘Browse’ tab).
     *
     * @return PendingRequest
     */
    public function featuredPlaylists(): PendingRequest
    {
        $endpoint = '/browse/featured-playlists/';

        $acceptedParams = [
            'locale' => $this->defaultConfig['locale'],
            'country' => $this->defaultConfig['country'],
            'timestamp' => null,
            'limit' => null,
            'offset' => null,
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Get a list of new album releases featured in Spotify (shown, for example, on a Spotify player’s “Browse” tab).
     *
     * @return PendingRequest
     */
    public function newReleases(): PendingRequest
    {
        $endpoint = '/browse/new-releases/';

        $acceptedParams = [
            'country' => $this->defaultConfig['country'],
            'limit' => null,
            'offset' => null,
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Create a playlist-style listening experience based on seed artists, tracks and genres.
     *
     * @param SpotifySeed $seed
     * @return PendingRequest
     */
    public function recommendations(SpotifySeed $seed): PendingRequest
    {
        $endpoint = '/recommendations/';

        $acceptedParams = array_merge([
            'limit' => null,
            'market' => $this->defaultConfig['market'],
        ], $seed->getArrayForApi());

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Get available genre seeds.
     *
     * @return PendingRequest
     */
    public function availableGenreSeeds(): PendingRequest
    {
        $endpoint = '/recommendations/available-genre-seeds/';

        return new PendingRequest($endpoint);
    }
}
