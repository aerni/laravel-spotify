<?php

namespace Aerni\Spotify\Tests;

use Spotify;

class ShowsTest extends TestCase
{
    private $showId = '488Ctw9jVD7jwwo7vPET14';

    private $showIds = ['488Ctw9jVD7jwwo7vPET14', '4rOoJ6Egrf8K2IrywzwOMk', '1Zuurv8AZFWti60lSXiDgz'];

    public function test_can_get_several_shows(): void
    {
        $shows = Spotify::shows($this->showIds)->get();
        $showId = $shows['shows'][0]['id'];

        $this->assertEquals($this->showIds[0], $showId);
    }

    public function test_can_get_a_show(): void
    {
        $show = Spotify::show($this->showId)->get();

        $this->assertEquals($show['id'], $this->showId);
    }

    public function test_can_get_show_episodes(): void
    {
        $episodes = Spotify::showEpisodes($this->showId)->get();

        $this->assertArrayHasKey('items', $episodes);
    }
}
