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
            return self::normalizeArgument($argument);
        } else {
            throw new ValidatorException("Please provide a string with comma-separated values or an array as the argument to the [{$key}] parameter.");
        }
    }

    /**
     * Normalize the provided argument.
     *
     * @param $argument
     * @return string
     */
    private static function normalizeArgument($argument): string
    {
        if (is_array($argument)) {
            $argument = collect($argument)->implode(',');
        } elseif (is_string($argument)) {
            $argument = str_replace(' ', '', $argument);
        }

        return $argument;
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
     * Convert an empty string to null.
     *
     * @param $value
     * @return string|null
     */
    public static function emptyStringToNull(string $value)
    {
        return is_string($value) && $value === '' ? null : $value;
    }
}
