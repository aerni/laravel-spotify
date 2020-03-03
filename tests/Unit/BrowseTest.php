<?php

namespace Aerni\Spotify\Tests;

use Aerni\Spotify\SpotifySeed;
use Spotify;

class BrowseTest extends TestCase
{
    public function test_can_get_a_category(): void
    {
        $categoryId = 'dinner';

        $category = Spotify::category($categoryId)->get();

        $this->assertEquals($category['id'], $categoryId);
    }

    public function test_can_get_category_playlists(): void
    {
        $categoryId = 'party';

        $categoryPlaylists = Spotify::categoryPlaylists($categoryId)->get();

        $this->assertArrayHasKey('playlists', $categoryPlaylists);
    }

    public function test_can_get_categories(): void
    {
        $categories = Spotify::categories()->get();

        $this->assertArrayHasKey('categories', $categories);
    }

    public function test_can_get_featured_playlists(): void
    {
        $featuredPlaylists = Spotify::featuredPlaylists()->get();

        $this->assertArrayHasKey('playlists', $featuredPlaylists);
    }

    public function test_can_get_new_releases(): void
    {
        $newReleases = Spotify::newReleases()->get();

        $this->assertArrayHasKey('albums', $newReleases);
    }

    public function test_can_get_recommendations(): void
    {
        $artistIds = ['0ADKN6ZiuyyScOTXloddx9', '3hyTRrdgrNuAExA3tNS8CA', '2FNOMU2OOusxW671wZKbKt'];

        $seed = (new SpotifySeed)
            ->addArtists($artistIds);

        $recommendations = Spotify::recommendations($seed)->get();

        $this->assertArrayHasKey('tracks', $recommendations);
    }

    public function test_can_get_available_genre_seeds(): void
    {
        $availableGenreSeeds = Spotify::availableGenreSeeds()->get();

        $this->assertArrayHasKey('genres', $availableGenreSeeds);
    }
}
