<?php

namespace Aerni\Spotify\Tests;

use Spotify;

class PlaylistsTest extends TestCase
{
    private $playlistId = '37i9dQZF1DWVYgpMbMPJMz';

    public function test_can_get_playlist_cover_image(): void
    {
        $coverImage = Spotify::playlistCoverImage($this->playlistId)->get();

        $this->assertArrayHasKey('url', $coverImage[0]);
    }

    public function test_can_get_a_playlist(): void
    {
        $playlist = Spotify::playlist($this->playlistId)->get();

        $this->assertEquals($playlist['id'], $this->playlistId);
    }

    public function test_can_get_playlist_tracks(): void
    {
        $playlistTracks = Spotify::playlistTracks($this->playlistId)->limit(50)->offset(10)->get();

        $this->assertArrayHasKey('items', $playlistTracks);
        $this->assertEquals(50, $playlistTracks['limit']);
        $this->assertEquals(10, $playlistTracks['offset']);
    }
}
