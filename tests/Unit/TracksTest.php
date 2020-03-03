<?php

namespace Aerni\Spotify\Tests;

use Spotify;

class TracksTest extends TestCase
{
    private $trackId = '35GACeX8Zl55jp29xFbvvo';
    private $trackIds = ['6RTOAaQeVkm1GUTqIY0hjp', '35GACeX8Zl55jp29xFbvvo', '5yNffCuv0YGOgRazVMfEP6'];

    public function test_can_get_audio_analysis_for_a_track(): void
    {
        $track = Spotify::audioAnalysisForTrack($this->trackId)->get();

        $this->assertArrayHasKey('bars', $track);
    }

    public function test_can_get_audio_features_for_a_track(): void
    {
        $track = Spotify::audioFeaturesForTrack($this->trackId)->get();

        $this->assertEquals($track['id'], $this->trackId);
    }

    public function test_can_get_audio_features_for_several_tracks(): void
    {
        $tracks = Spotify::audioFeaturesForTracks($this->trackIds)->get();

        $this->assertArrayHasKey('audio_features', $tracks);
    }

    public function test_can_get_several_tracks(): void
    {
        $tracks = Spotify::tracks($this->trackIds)->get();
        $trackId = $tracks['tracks'][0]['id'];

        $this->assertEquals($this->trackIds[0], $trackId);
    }

    public function test_can_get_a_track(): void
    {
        $track = Spotify::track($this->trackId)->get();

        $this->assertEquals($track['id'], $this->trackId);
    }
}
