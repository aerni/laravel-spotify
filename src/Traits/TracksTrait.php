<?php

namespace Aerni\Spotify\Traits;

use Aerni\Spotify\PendingRequest;

trait TracksTrait
{
    /**
     * Get a detailed audio analysis for a single track identified by its unique Spotify ID.
     *
     * @param string $id
     * @return PendingRequest
     */
    public function audioAnalysisForTrack(string $id): PendingRequest
    {
        $endpoint = '/audio-analysis/' . $id;

        return new PendingRequest($endpoint);
    }

    /**
     * Get audio feature information for a single track identified by its unique Spotify ID.
     *
     * @param string $id
     * @return PendingRequest
     */
    public function audioFeaturesForTrack(string $id): PendingRequest
    {
        $endpoint = '/audio-features/' . $id;

        return new PendingRequest($endpoint);
    }

    /**
     * Get audio features for multiple tracks based on their Spotify IDs.
     *
     * @param array|string $ids
     * @return PendingRequest
     */
    public function audioFeaturesForTracks($ids): PendingRequest
    {
        $endpoint = '/audio-features/';

        $acceptedParams = [
            'ids' => $this->validateArgument('ids', $ids),
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Get Spotify catalog information for multiple tracks based on their Spotify IDs.
     *
     * @param array|string $ids
     * @return PendingRequest
     */
    public function tracks($ids): PendingRequest
    {
        $endpoint = '/tracks/';

        $acceptedParams = [
            'ids' => $this->validateArgument('ids', $ids),
            'market' => $this->defaultConfig['market'],
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Get Spotify catalog information for a single track identified by its unique Spotify ID.
     *
     * @param string $id
     * @return PendingRequest
     */
    public function track(string $id): PendingRequest
    {
        $endpoint = '/tracks/' . $id;

        $acceptedParams = [
            'market' => $this->defaultConfig['market'],
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }
}
