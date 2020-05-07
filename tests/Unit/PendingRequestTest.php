<?php

namespace Aerni\Spotify\Tests;

use Aerni\Spotify\PendingRequest;
use Exception;

class PendingRequestTest extends TestCase
{
    public function test_can_set_requested_parameters(): void
    {
        $acceptedParams = [
            'country' => null,
            'fields' => null,
            'include_groups' => null,
            'include_external' => null,
            'limit' => null,
            'offset' => null,
            'market' => null,
            'locale' => null,
            'timestamp' => null,
        ];

        $pendingRequest = new PendingRequest('endpoint', $acceptedParams);

        $pendingRequest
            ->country('country')
            ->fields('fields')
            ->includeGroups('include_groups')
            ->includeExternal('include_external')
            ->limit(10)
            ->offset(10)
            ->market('market')
            ->locale('locale')
            ->timestamp('timestamp');

        $this->assertArrayHasKey('country', $pendingRequest->requestedParams);
        $this->assertArrayHasKey('fields', $pendingRequest->requestedParams);
        $this->assertArrayHasKey('include_groups', $pendingRequest->requestedParams);
        $this->assertArrayHasKey('include_external', $pendingRequest->requestedParams);
        $this->assertArrayHasKey('limit', $pendingRequest->requestedParams);
        $this->assertArrayHasKey('offset', $pendingRequest->requestedParams);
        $this->assertArrayHasKey('market', $pendingRequest->requestedParams);
        $this->assertArrayHasKey('locale', $pendingRequest->requestedParams);
        $this->assertArrayHasKey('timestamp', $pendingRequest->requestedParams);
    }

    public function test_throws_error_when_setting_a_requested_paramter_that_is_not_accepted_by_the_api()
    {
        $acceptedParams = [
            'country' => null,
        ];

        $pendingRequest = new PendingRequest('endpoint', $acceptedParams);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The parameter [limit] can’t be used with this endpoint. Accepted parameters: [country].');

        $pendingRequest->limit(10);
    }
}
