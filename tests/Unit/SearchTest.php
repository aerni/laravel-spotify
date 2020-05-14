<?php

namespace Aerni\Spotify\Tests;

use Exception;
use Spotify;

class SearchTest extends TestCase
{
    public function test_can_search_for_items_and_pass_types_as_an_array(): void
    {
        $query = 'Tremble';
        $typesArray = ['album', 'artist', 'playlist', 'track'];

        $items = Spotify::searchItems($query, $typesArray)->limit(10)->get();

        $this->assertCount(4, $items);
        $this->assertCount(10, $items['tracks']['items']);
        $this->assertEquals(0, $items['tracks']['offset']);
    }

    public function test_can_search_for_items_and_pass_types_as_a_string(): void
    {
        $query = 'Tremble';
        $typesString = 'album, artist, playlist, track';

        $items = Spotify::searchItems($query, $typesString)->limit(10)->get();

        $this->assertCount(4, $items);
        $this->assertCount(10, $items['tracks']['items']);
        $this->assertEquals(0, $items['tracks']['offset']);
    }

    public function test_throws_exception_when_passing_an_argument_that_is_not_valid(): void
    {
        $query = 'Tremble';

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Please provide a string with comma-separated values or an array as the argument to the [type] parameter.');

        $items = Spotify::searchItems($query, true)->get();
    }

    public function test_can_search_for_albums(): void
    {
        $query = 'Tremble';

        $albums = Spotify::searchAlbums($query)->limit(10)->offset(20)->get('albums');
        $albumName = $albums['items'][0]['name'];

        $this->assertStringContainsStringIgnoringCase($query, $albumName);
        $this->assertCount(10, $albums['items']);
        $this->assertEquals(20, $albums['offset']);
    }

    public function test_can_search_for_artists(): void
    {
        $query = 'Columbus';

        $artists = Spotify::searchArtists($query)->limit(10)->offset(20)->get();
        $artistName = $artists['artists']['items'][0]['name'];

        $this->assertStringContainsStringIgnoringCase($query, $artistName);
        $this->assertCount(10, $artists['artists']['items']);
        $this->assertEquals(20, $artists['artists']['offset']);
    }

    public function test_can_search_for_episodes(): void
    {
        $query = 'Worship';

        $episodes = Spotify::searchEpisodes($query)->limit(10)->offset(20)->get();
        $episodeName = $episodes['episodes']['items'][0]['name'];

        $this->assertStringContainsStringIgnoringCase($query, $episodeName);
        $this->assertCount(10, $episodes['episodes']['items']);
        $this->assertEquals(20, $episodes['episodes']['offset']);
    }

    public function test_can_search_for_playlists(): void
    {
        $query = 'Worship';

        $playlists = Spotify::searchPlaylists($query)->limit(20)->offset(5)->get();
        $playlistName = $playlists['playlists']['items'][0]['name'];

        $this->assertStringContainsStringIgnoringCase($query, $playlistName);
        $this->assertCount(20, $playlists['playlists']['items']);
        $this->assertEquals(5, $playlists['playlists']['offset']);
    }

    public function test_can_search_for_shows(): void
    {
        $query = 'Worship';

        $shows = Spotify::searchShows($query)->limit(10)->offset(20)->get();
        $showName = $shows['shows']['items'][0]['name'];

        $this->assertStringContainsStringIgnoringCase($query, $showName);
        $this->assertCount(10, $shows['shows']['items']);
        $this->assertEquals(20, $shows['shows']['offset']);
    }

    public function test_can_search_for_tracks(): void
    {
        $query = 'Tremble';

        $tracks = Spotify::searchTracks($query)->limit(15)->offset(10)->get();
        $trackName = $tracks['tracks']['items'][0]['name'];

        $this->assertStringContainsStringIgnoringCase($query, $trackName);
        $this->assertCount(15, $tracks['tracks']['items']);
        $this->assertEquals(10, $tracks['tracks']['offset']);
    }
}
