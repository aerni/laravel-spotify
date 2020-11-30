<?php

namespace Aerni\Spotify\Tests;

use Spotify;

class UsersTest extends TestCase
{
    private $userId = '21drtyolp7mfwvb2fpoexyaqq';

    public function test_can_get_a_user(): void
    {
        $user = Spotify::user($this->userId)->get();

        $this->assertEquals($user['id'], $this->userId);
    }

    public function test_can_get_user_playlists(): void
    {
        $playlists = Spotify::userPlaylists($this->userId)->get();

        $this->assertArrayHasKey('items', $playlists);
    }
}
