<?php

namespace Aerni\Spotify\Tests;

use Spotify;

class AlbumsTest extends TestCase
{
    private $albumId = '1Dm5rDVBBeLLjqfzBkuadR';
    private $albumIds = ['1Dm5rDVBBeLLjqfzBkuadR', '5phxHbK2GSr7hEu4orLywP', '3WEwS5DLsagnqQtHP2oEEu'];

    public function test_can_get_an_album(): void
    {
        $album = Spotify::album($this->albumId)->get();

        $this->assertEquals($album['id'], $this->albumId);
    }

    public function test_can_get_album_tracks(): void
    {
        $tracks = Spotify::albumTracks($this->albumId)->get();

        $this->assertArrayHasKey('items', $tracks);
    }

    public function test_can_get_several_albums(): void
    {
        $album = Spotify::albums($this->albumIds)->get();
        $albumId = $album['albums'][0]['id'];

        $this->assertEquals($this->albumIds[0], $albumId);
    }
}
