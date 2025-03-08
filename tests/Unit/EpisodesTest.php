<?php

namespace Aerni\Spotify\Tests;

use Spotify;

class EpisodesTest extends TestCase
{
    private $episodeId = '0bA111JKkvh84dM2evLENB';

    private $episodeIds = ['0bA111JKkvh84dM2evLENB', '7HLqYy8myk9BduYj6vFDHB', '1iUYyZ5MCBwGPfaJLnILjY'];

    public function test_can_get_several_episodes(): void
    {
        $episodes = Spotify::episodes($this->episodeIds)->get();
        $episodeId = $episodes['episodes'][0]['id'];

        $this->assertEquals($this->episodeIds[0], $episodeId);
    }

    public function test_can_get_a_episode(): void
    {
        $episode = Spotify::episode($this->episodeId)->get();

        $this->assertEquals($episode['id'], $this->episodeId);
    }
}
