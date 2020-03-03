<?php

namespace Aerni\Spotify\Tests;

use Spotify;

class ArtistsTest extends TestCase
{
    private $artistId = '3hyTRrdgrNuAExA3tNS8CA';
    private $artistIds = ['0ADKN6ZiuyyScOTXloddx9', '3hyTRrdgrNuAExA3tNS8CA', '2FNOMU2OOusxW671wZKbKt'];

    public function test_can_get_an_artist(): void
    {
        $artist = Spotify::artist($this->artistId)->get();

        $this->assertEquals($artist['id'], $this->artistId);
    }

    public function test_can_get_artist_albums(): void
    {
        $albums = Spotify::artistAlbums($this->artistId)->get();

        $this->assertArrayHasKey('items', $albums);
    }

    public function test_can_get_artist_top_tracks(): void
    {
        $tracks = Spotify::artistTopTracks($this->artistId)->get();
        $artist = $tracks['tracks'][0]['artists'][0]['id'];

        $this->assertEquals($artist, $this->artistId);
    }

    public function test_can_get_artist_related_artists(): void
    {
        $artists = Spotify::artistRelatedArtists($this->artistId)->get();

        $this->assertArrayHasKey('artists', $artists);
    }

    public function test_can_get_several_artists(): void
    {
        $artists = Spotify::artists($this->artistIds)->get();
        $artistId = $artists['artists'][0]['id'];

        $this->assertEquals($this->artistIds[0], $artistId);
    }
}
