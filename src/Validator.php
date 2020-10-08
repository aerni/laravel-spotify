<?php

namespace Aerni\Spotify;

use Aerni\Spotify\Exceptions\ValidatorException;

class Validator
{
    /**
     * Validate the provided argument. Throw an error if the argument is not valid.
     *
     * @param string $key
     * @param $argument
     * @return string
     * @throws ValidatorException
     */
    public static function validateArgument(string $key, $argument): string
    {
        if (self::argumentIsValid($argument)) {
            return Normalizer::normalizeArgument($argument);
        } else {
            throw new ValidatorException("Please provide a string with comma-separated values or an array as the argument to the [{$key}] parameter.");
        }
    }

    /**
     * Validate the requested parameter. Throw an error if the parameter is not accepted.
     *
     * @param string $requestedParam
     * @param $acceptedParams
     * @return string
     * @throws ValidatorException
     */
    public static function validateRequestedParam(string $requestedParam, $acceptedParams): string
    {
        if (self::requestedParamIsAccepted($requestedParam, $acceptedParams)) {
            return Normalizer::normalizeArgument($requestedParam);
        } else {
            $acceptedParams = collect($acceptedParams)->keys()->implode(', ');

            throw new ValidatorException("The parameter [{$requestedParam}] can’t be used with this endpoint. Accepted parameters: [{$acceptedParams}].");
        }
    }

    /**
     * Check if the provided argument is valid.
     *
     * @param $argument
     * @return bool
     */
    private static function argumentIsValid($argument): bool
    {
        if (! empty($argument) && is_array($argument)) {
            return true;
        }

        if (! empty($argument) && is_string($argument)) {
            return true;
        }

        return false;
    }

    /**
     * Check if the provided parameters is valid.
     *
     * @param $requestedParam
     * @param $acceptedParams
     * @return bool
     */
    private static function requestedParamIsAccepted($requestedParam, $acceptedParams): bool
    {
        if (array_key_exists($requestedParam, $acceptedParams)) {
            return true;
        }

        return false;
    }
}
