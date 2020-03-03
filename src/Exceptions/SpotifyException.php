<?php

namespace Aerni\Spotify\Exceptions;

use Exception;

class SpotifyException extends Exception
{
    protected $apiResponse;

    public function __construct($message = null, $code = 0, $apiResponse = null, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->apiResponse = $apiResponse;
    }

    /**
     * Get the API Response.
     */
    public function getApiResponse()
    {
        return $this->apiResponse;
    }
}
