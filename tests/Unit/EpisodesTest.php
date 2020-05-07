<?php

namespace Aerni\Spotify\Tests;

use Spotify;

class EpisodesTest extends TestCase
{
    private $episodeId = '512ojhOuo1ktJprKbVcKyQ';
    private $episodeIds = ['512ojhOuo1ktJprKbVcKyQ', '77o6BIVlYM3msb4MMIL1jH', '0Q86acNRm6V9GYx55SXKwf'];

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
