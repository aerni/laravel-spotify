<?php

namespace Aerni\Spotify\Traits;

use Exception;

trait HelpersTrait
{
    /**
     * Validate the provided argument. Throw an error if the argument is not valid.
     *
     * @param string $key
     * @param $argument
     * @return string
     * @throws Exception
     */
    private function validateArgument(string $key, $argument): string
    {
        if ($this->argumentIsValid($argument)) {
            return $this->normalizeArgument($argument);
        } else {
            throw new Exception("Please provide a string with comma-separated values or an array as the argument to the [{$key}] parameter.");
        }
    }

    /**
     * Normalize the provided argument.
     *
     * @param $argument
     * @return string
     */
    private function normalizeArgument($argument): string
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
    private function argumentIsValid($argument): bool
    {
        if (!empty($argument) && is_array($argument)) {
            return true;
        }

        if (!empty($argument) && is_string($argument)) {
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
    private function emptyStringToNull(string $value)
    {
        return is_string($value) && $value === '' ? null : $value;
    }
}
