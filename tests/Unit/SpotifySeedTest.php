<?php

namespace Aerni\Spotify\Tests;

use Aerni\Spotify\SpotifySeed;

class SpotifySeedTest extends TestCase
{
    public function test_can_add_and_set_artists(): void
    {
        $seed = new SpotifySeed();
        $this->assertEquals(count($seed->artists), 0);
        $this->assertEquals(count($seed->getArrayForApi()), 0);

        $seed->addArtist('1');
        $this->assertEquals(count($seed->getArrayForApi()), 1);
        $this->assertEquals(count($seed->artists), 1);

        $seed->addArtists('1');
        $this->assertEquals(count($seed->getArrayForApi()), 1);
        $this->assertEquals(count($seed->artists), 1);

        $seed->addArtists('1,2');
        $this->assertEquals(count($seed->getArrayForApi()), 1);
        $this->assertEquals(count($seed->artists), 2);

        $seed->addArtists(['3', '4']);
        $this->assertEquals(count($seed->getArrayForApi()), 1);
        $this->assertEquals(count($seed->artists), 4);

        $seed->addArtists(['1', '2', '3', '4']);
        $this->assertEquals(count($seed->getArrayForApi()), 1);
        $this->assertEquals(count($seed->artists), 4);

        $seed->setArtists(['5', '6']);
        $this->assertEquals(count($seed->artists), 2);
        $this->assertEquals(count($seed->getArrayForApi()), 1);

        $seed->setArtists('5,6,7');
        $this->assertEquals(count($seed->artists), 3);
        $this->assertEquals(count($seed->getArrayForApi()), 1);
    }

    public function test_can_add_and_set_genres(): void
    {
        $seed = new SpotifySeed;
        $this->assertEquals(count($seed->genres), 0);
        $this->assertEquals(count($seed->getArrayForApi()), 0);

        $seed->addGenre('1');
        $this->assertEquals(count($seed->genres), 1);
        $this->assertEquals(count($seed->getArrayForApi()), 1);

        $seed->addGenres('1');
        $this->assertEquals(count($seed->genres), 1);
        $this->assertEquals(count($seed->getArrayForApi()), 1);

        $seed->addGenres('1,2');
        $this->assertEquals(count($seed->genres), 2);
        $this->assertEquals(count($seed->getArrayForApi()), 1);

        $seed->addGenres(['3', '4']);
        $this->assertEquals(count($seed->genres), 4);
        $this->assertEquals(count($seed->getArrayForApi()), 1);

        $seed->addGenres(['1', '2', '3', '4']);
        $this->assertEquals(count($seed->genres), 4);
        $this->assertEquals(count($seed->getArrayForApi()), 1);

        $seed->setGenres(['5', '6']);
        $this->assertEquals(count($seed->genres), 2);
        $this->assertEquals(count($seed->getArrayForApi()), 1);

        $seed->setGenres('5,6,7');
        $this->assertEquals(count($seed->genres), 3);
        $this->assertEquals(count($seed->getArrayForApi()), 1);
    }

    public function test_can_add_and_set_tracks(): void
    {
        $seed = new SpotifySeed;
        $this->assertEquals(count($seed->tracks), 0);
        $this->assertEquals(count($seed->getArrayForApi()), 0);

        $seed->addTrack('1');
        $this->assertEquals(count($seed->tracks), 1);
        $this->assertEquals(count($seed->getArrayForApi()), 1);

        $seed->addTracks('1');
        $this->assertEquals(count($seed->tracks), 1);
        $this->assertEquals(count($seed->getArrayForApi()), 1);

        $seed->addTracks('1,2');
        $this->assertEquals(count($seed->tracks), 2);
        $this->assertEquals(count($seed->getArrayForApi()), 1);

        $seed->addTracks(['3', '4']);
        $this->assertEquals(count($seed->tracks), 4);
        $this->assertEquals(count($seed->getArrayForApi()), 1);

        $seed->addTracks(['1', '2', '3', '4']);
        $this->assertEquals(count($seed->tracks), 4);
        $this->assertEquals(count($seed->getArrayForApi()), 1);

        $seed->setTracks(['5', '6']);
        $this->assertEquals(count($seed->tracks), 2);
        $this->assertEquals(count($seed->getArrayForApi()), 1);

        $seed->setTracks('5,6,7');
        $this->assertEquals(count($seed->tracks), 3);
        $this->assertEquals(count($seed->getArrayForApi()), 1);
    }

    public function test_can_set_properties(): void
    {
        $seed = new SpotifySeed;
        $this->assertEquals(count($seed->getArrayForApi()), 0);

        $seed->setAcousticness(80, 100);
        $seed->setTargetAcousticness(90);
        $this->assertEquals($seed->acousticnessRange[0], 80.00);
        $this->assertEquals($seed->acousticnessRange[1], 100.00);
        $this->assertEquals($seed->targetAcousticness, 90.00);
        $this->assertEquals(count($seed->getArrayForApi()), 3);

        $seed->setDanceability(80, 100);
        $seed->setTargetDanceability(90);
        $this->assertEquals($seed->danceabilityRange[0], 80.00);
        $this->assertEquals($seed->danceabilityRange[1], 100.00);
        $this->assertEquals($seed->targetDanceability, 90.00);
        $this->assertEquals(count($seed->getArrayForApi()), 6);

        $seed->setEnergy(80, 100);
        $seed->setTargetEnergy(90);
        $this->assertEquals($seed->energyRange[0], 80.00);
        $this->assertEquals($seed->energyRange[1], 100.00);
        $this->assertEquals($seed->targetEnergy, 90.00);
        $this->assertEquals(count($seed->getArrayForApi()), 9);

        $seed->setInstrumentalness(80, 100);
        $seed->setTargetInstrumentalness(90);
        $this->assertEquals($seed->instrumentalnessRange[0], 80.00);
        $this->assertEquals($seed->instrumentalnessRange[1], 100.00);
        $this->assertEquals($seed->targetInstrumentalness, 90.00);
        $this->assertEquals(count($seed->getArrayForApi()), 12);

        $seed->setKey(1, 3);
        $seed->setTargetKey(2);
        $this->assertEquals($seed->keyRange[0], 1);
        $this->assertEquals($seed->keyRange[1], 3);
        $this->assertEquals($seed->targetKey, 2);
        $this->assertEquals(count($seed->getArrayForApi()), 15);

        $seed->setLiveness(80, 100);
        $seed->setTargetLiveness(90);
        $this->assertEquals($seed->livenessRange[0], 80.00);
        $this->assertEquals($seed->livenessRange[1], 100.00);
        $this->assertEquals($seed->targetLiveness, 90.00);
        $this->assertEquals(count($seed->getArrayForApi()), 18);

        $seed->setLoudness(80, 100);
        $seed->setTargetLoudness(90);
        $this->assertEquals($seed->loudnessRange[0], 80.00);
        $this->assertEquals($seed->loudnessRange[1], 100.00);
        $this->assertEquals($seed->targetLoudness, 90.00);
        $this->assertEquals(count($seed->getArrayForApi()), 21);

        $seed->setMode(0, 1);
        $seed->setTargetMode(0);
        $this->assertEquals($seed->modeRange[0], 0);
        $this->assertEquals($seed->modeRange[1], 1);
        $this->assertEquals($seed->targetMode, 0);
        $this->assertEquals(count($seed->getArrayForApi()), 24);

        $seed->setPopularity(80, 100);
        $seed->setTargetPopularity(90);
        $this->assertEquals($seed->popularityRange[0], 80.00);
        $this->assertEquals($seed->popularityRange[1], 100.00);
        $this->assertEquals($seed->targetPopularity, 90.00);
        $this->assertEquals(count($seed->getArrayForApi()), 27);

        $seed->setSpeechiness(80, 100);
        $seed->setTargetSpeechiness(90);
        $this->assertEquals($seed->speechinessRange[0], 80.00);
        $this->assertEquals($seed->speechinessRange[1], 100.00);
        $this->assertEquals($seed->targetSpeechiness, 90.00);
        $this->assertEquals(count($seed->getArrayForApi()), 30);

        $seed->setTempo(100, 120);
        $seed->setTargetTempo(110);
        $this->assertEquals($seed->tempoRange[0], 100);
        $this->assertEquals($seed->tempoRange[1], 120);
        $this->assertEquals($seed->targetTempo, 110);
        $this->assertEquals(count($seed->getArrayForApi()), 33);

        $seed->setTimeSignature(100, 120);
        $seed->setTargetTimeSignature(110);
        $this->assertEquals($seed->timeSignatureRange[0], 100);
        $this->assertEquals($seed->timeSignatureRange[1], 120);
        $this->assertEquals($seed->targetTimeSignature, 110);
        $this->assertEquals(count($seed->getArrayForApi()), 36);

        $seed->setValence(80, 100);
        $seed->setTargetValence(90);
        $this->assertEquals($seed->valenceRange[0], 80.00);
        $this->assertEquals($seed->valenceRange[1], 100.00);
        $this->assertEquals($seed->targetValence, 90.00);
        $this->assertEquals(count($seed->getArrayForApi()), 39);

        $seed->setDuration(100000, 120000);
        $seed->setTargetDuration(110000);
        $this->assertEquals($seed->durationRange[0], 100000);
        $this->assertEquals($seed->durationRange[1], 120000);
        $this->assertEquals($seed->targetDuration, 110000);
        $this->assertEquals(count($seed->getArrayForApi()), 42);

        $seed->setTracks(['1', '2']);
        $this->assertEquals(count($seed->getArrayForApi()), 43);

        $seed->setGenres(['1', '2']);
        $this->assertEquals(count($seed->getArrayForApi()), 44);

        $seed->setArtists(['1', '2']);
        $this->assertEquals(count($seed->getArrayForApi()), 45);
    }
}
