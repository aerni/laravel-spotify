<?php

namespace Aerni\Spotify;

use Aerni\Spotify\Exceptions\SpotifyApiException;
use Illuminate\Support\Collection;

class CreateRequestAction
{
    /**
     * Execute the pending request and return the response from the Spotify API.
     *
     * @param PendingRequest $pendingRequest
     * @return array
     * @throws SpotifyApiException
     */
    public function execute(PendingRequest $pendingRequest): array
    {
        $endpoint = $pendingRequest->endpoint;
        $responseArrayKey = $pendingRequest->responseArrayKey;

        $acceptedParams = collect($pendingRequest->acceptedParams);
        $requestedParams = collect($pendingRequest->requestedParams);
        $finalParams = $this->createFinalParams($acceptedParams, $requestedParams);

        $response = resolve(SpotifyRequest::class)->get($endpoint, $finalParams);

        if ($responseArrayKey) {
            return $response[$responseArrayKey];
        }

        return $response;
    }

    /**
     * This merges the requested and accepted parameters and outputs the final parameters ready for the API call.
     *
     * @param Collection $acceptedParams
     * @param Collection $requestedParams
     * @return array
     */
    private function createFinalParams(Collection $acceptedParams, Collection $requestedParams): array
    {
        $intersectedRequestedParams = $requestedParams->intersectByKeys($acceptedParams);

        $mergedParams = $acceptedParams->merge($intersectedRequestedParams);

        $validParams = $mergedParams->filter(function ($value) {
            return $value !== null;
        });

        return $validParams->toArray();
    }
}
