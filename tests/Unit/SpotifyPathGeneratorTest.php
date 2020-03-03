<?php

namespace Aerni\Spotify\Tests;

use Aerni\Spotify\SpotifyPathGenerator;

class SpotifyPathGeneratorTest extends TestCase
{
    public function test_can_generate_spotify_uris(): void
    {
        $this->assertEquals(SpotifyPathGenerator::getAlbumUri('123'), 'spotify:album:123');
        $this->assertEquals(SpotifyPathGenerator::getArtistUri('123'), 'spotify:artist:123');
        $this->assertEquals(SpotifyPathGenerator::getPlaylistUri('123'), 'spotify:user:spotify:playlist:123');
        $this->assertEquals(SpotifyPathGenerator::getTrackUri('123'), 'spotify:track:123');
    }

    public function test_can_generate_spotify_urls(): void
    {
        $this->assertEquals(SpotifyPathGenerator::getAlbumUrl('123'), 'https://open.spotify.com/album/123');
        $this->assertEquals(SpotifyPathGenerator::getArtistUrl('123'), 'https://open.spotify.com/artist/123');
        $this->assertEquals(SpotifyPathGenerator::getPlaylistUrl('123'), 'https://open.spotify.com/playlist/123');
        $this->assertEquals(SpotifyPathGenerator::getTrackUrl('123'), 'https://open.spotify.com/track/123');
    }
}
