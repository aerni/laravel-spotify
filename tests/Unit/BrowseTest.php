<?php

namespace Aerni\Spotify\Tests;

use Spotify;

class BrowseTest extends TestCase
{
    public function test_can_get_a_category(): void
    {
        $categoryId = 'dinner';

        $category = Spotify::category($categoryId)->get();

        $this->assertEquals($category['id'], '0JQ5DAqbMKFRY5ok2pxXJ0');
    }

    public function test_can_get_categories(): void
    {
        $categories = Spotify::categories()->get();

        $this->assertArrayHasKey('categories', $categories);
    }

    public function test_can_get_new_releases(): void
    {
        $newReleases = Spotify::newReleases()->get();

        $this->assertArrayHasKey('albums', $newReleases);
    }
}
