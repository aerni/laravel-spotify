<?php

namespace Aerni\Spotify;

use Exception;

class PendingRequest
{
    public $endpoint;
    public $acceptedParams;
    public $responseArrayKey;

    public $requestedParams;

    public function __construct(string $endpoint, array $acceptedParams = [])
    {
        $this->endpoint = $endpoint;
        $this->acceptedParams = $acceptedParams;
    }

    /**
     * Set the country if provided.
     *
     * @param string $country
     * @return $this
     * @throws Exception
     */
    public function country(string $country = null): self
    {
        $this->setRequestedParam('country', $country);

        return $this;
    }

    /**
     * Set the fields if provided.
     *
     * @param string $fields
     * @return $this
     * @throws Exception
     */
    public function fields(string $fields): self
    {
        $this->setRequestedParam('fields', $fields);

        return $this;
    }

    /**
     * Set include_external if provided.
     *
     * @param string $value
     * @return $this
     * @throws Exception
     */
    public function includeExternal(string $value): self
    {
        $this->setRequestedParam('include_external', $value);

        return $this;
    }

    /**
     * Set include_groups if provided.
     *
     * @param string $value
     * @return $this
     * @throws Exception
     */
    public function includeGroups(string $value): self
    {
        $this->setRequestedParam('include_groups', $value);

        return $this;
    }

    /**
     * Set the limit if provided.
     *
     * @param int $limit
     * @return $this
     * @throws Exception
     */
    public function limit(int $limit): self
    {
        $this->setRequestedParam('limit', $limit);

        return $this;
    }

    /**
     * Set the offset if provided.
     *
     * @param int $offset
     * @return $this
     * @throws Exception
     */
    public function offset(int $offset): self
    {
        $this->setRequestedParam('offset', $offset);

        return $this;
    }

    /**
     * Set the market if provided.
     *
     * @param string|null $market
     * @return $this
     * @throws Exception
     */
    public function market(string $market = null): self
    {
        $this->setRequestedParam('market', $market);

        return $this;
    }

    /**
     * Set the locale if provided.
     *
     * @param string|null $locale
     * @return $this
     * @throws Exception
     */
    public function locale(string $locale = null): self
    {
        $this->setRequestedParam('locale', $locale);

        return $this;
    }

    /**
     * Set the timestamp if provided.
     *
     * @param string $timestamp
     * @return $this
     * @throws Exception
     */
    public function timestamp(string $timestamp): self
    {
        $this->setRequestedParam('timestamp', $timestamp);

        return $this;
    }

    /**
     * Add the requested parameters to an array.
     *
     * @param string $key
     * @param int|string|null $value
     * @throws Exception
     */
    private function setRequestedParam(string $key, $value): void
    {
        $this->validateRequestedParam($key);

        $value = $this->normalizeArgument($value);

        $this->requestedParams[$key] = $value;
    }

    /**
     * Validate if the requested parameters are accepted.
     *
     * @param string $key
     * @throws Exception
     */
    private function validateRequestedParam(string $key): void
    {
        if (!array_key_exists($key, $this->acceptedParams)) {
            throw new Exception("The parameter [{$key}] is not accepted for this API call.");
        }
    }

    /**
     * Normalize the arguments.
     *
     * @param $param
     * @return string
     */
    private function normalizeArgument($param)
    {
        if (is_string($param)) {
            $param = str_replace(' ', '', $param);
        }

        return $param;
    }

    /**
     * Execute the request. This is the final method and has to be called at the end of the method chain.
     *
     * @param string|null $responseArrayKey
     * @return array
     * @throws Exceptions\SpotifyApiException
     */
    public function get(string $responseArrayKey = null): array
    {
        $this->responseArrayKey = $responseArrayKey;

        return resolve(CreateRequestAction::class)->execute($this);
    }
}
