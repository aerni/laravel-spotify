<?php

namespace Aerni\Spotify\Tests;

use SpotifySeed;

class SpotifySeedTest extends TestCase
{
    public function test_can_add_and_set_artists(): void
    {
        $seedProperties = SpotifySeed::getFacadeRoot();

        $this->assertEquals(count($seedProperties->artists), 0);
        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 0);

        SpotifySeed::addArtist('1');
        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 1);
        $this->assertEquals(count($seedProperties->artists), 1);

        SpotifySeed::addArtists('1');
        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 1);
        $this->assertEquals(count($seedProperties->artists), 1);

        SpotifySeed::addArtists('1,2');
        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 1);
        $this->assertEquals(count($seedProperties->artists), 2);

        SpotifySeed::addArtists(['3', '4']);
        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 1);
        $this->assertEquals(count($seedProperties->artists), 4);

        SpotifySeed::addArtists(['1', '2', '3', '4']);
        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 1);
        $this->assertEquals(count($seedProperties->artists), 4);

        SpotifySeed::setArtists(['5', '6']);
        $this->assertEquals(count($seedProperties->artists), 2);
        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 1);

        SpotifySeed::setArtists('5, 6, 7');
        $this->assertEquals(count($seedProperties->artists), 3);
        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 1);
    }

    public function test_can_add_and_set_genres(): void
    {
        $seedProperties = SpotifySeed::getFacadeRoot();

        $this->assertEquals(count($seedProperties->genres), 0);
        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 0);

        SpotifySeed::addGenre('1');
        $this->assertEquals(count($seedProperties->genres), 1);
        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 1);

        SpotifySeed::addGenres('1');
        $this->assertEquals(count($seedProperties->genres), 1);
        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 1);

        SpotifySeed::addGenres('1,2');
        $this->assertEquals(count($seedProperties->genres), 2);
        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 1);

        SpotifySeed::addGenres(['3', '4']);
        $this->assertEquals(count($seedProperties->genres), 4);
        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 1);

        SpotifySeed::addGenres(['1', '2', '3', '4']);
        $this->assertEquals(count($seedProperties->genres), 4);
        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 1);

        SpotifySeed::setGenres(['5', '6']);
        $this->assertEquals(count($seedProperties->genres), 2);
        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 1);

        SpotifySeed::setGenres('5, 6, 7');
        $this->assertEquals(count($seedProperties->genres), 3);
        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 1);
    }

    public function test_can_add_and_set_tracks(): void
    {
        $seedProperties = SpotifySeed::getFacadeRoot();

        $this->assertEquals(count($seedProperties->tracks), 0);
        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 0);

        SpotifySeed::addTrack('1');
        $this->assertEquals(count($seedProperties->tracks), 1);
        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 1);

        SpotifySeed::addTracks('1');
        $this->assertEquals(count($seedProperties->tracks), 1);
        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 1);

        SpotifySeed::addTracks('1,2');
        $this->assertEquals(count($seedProperties->tracks), 2);
        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 1);

        SpotifySeed::addTracks(['3', '4']);
        $this->assertEquals(count($seedProperties->tracks), 4);
        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 1);

        SpotifySeed::addTracks(['1', '2', '3', '4']);
        $this->assertEquals(count($seedProperties->tracks), 4);
        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 1);

        SpotifySeed::setTracks(['5', '6']);
        $this->assertEquals(count($seedProperties->tracks), 2);
        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 1);

        SpotifySeed::setTracks('5, 6, 7');
        $this->assertEquals(count($seedProperties->tracks), 3);
        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 1);
    }

    public function test_can_set_properties(): void
    {
        $seedProperties = SpotifySeed::getFacadeRoot();

        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 0);

        SpotifySeed::setAcousticness(80, 100);
        SpotifySeed::setTargetAcousticness(90);
        $this->assertEquals($seedProperties->acousticnessRange[0], 80.00);
        $this->assertEquals($seedProperties->acousticnessRange[1], 100.00);
        $this->assertEquals($seedProperties->targetAcousticness, 90.00);
        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 3);

        SpotifySeed::setDanceability(80, 100);
        SpotifySeed::setTargetDanceability(90);
        $this->assertEquals($seedProperties->danceabilityRange[0], 80.00);
        $this->assertEquals($seedProperties->danceabilityRange[1], 100.00);
        $this->assertEquals($seedProperties->targetDanceability, 90.00);
        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 6);

        SpotifySeed::setDuration(100000, 120000);
        SpotifySeed::setTargetDuration(110000);
        $this->assertEquals($seedProperties->durationRange[0], 100000);
        $this->assertEquals($seedProperties->durationRange[1], 120000);
        $this->assertEquals($seedProperties->targetDuration, 110000);
        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 9);

        SpotifySeed::setEnergy(80, 100);
        SpotifySeed::setTargetEnergy(90);
        $this->assertEquals($seedProperties->energyRange[0], 80.00);
        $this->assertEquals($seedProperties->energyRange[1], 100.00);
        $this->assertEquals($seedProperties->targetEnergy, 90.00);
        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 12);

        SpotifySeed::setInstrumentalness(80, 100);
        SpotifySeed::setTargetInstrumentalness(90);
        $this->assertEquals($seedProperties->instrumentalnessRange[0], 80.00);
        $this->assertEquals($seedProperties->instrumentalnessRange[1], 100.00);
        $this->assertEquals($seedProperties->targetInstrumentalness, 90.00);
        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 15);

        SpotifySeed::setKey(1, 3);
        SpotifySeed::setTargetKey(2);
        $this->assertEquals($seedProperties->keyRange[0], 1);
        $this->assertEquals($seedProperties->keyRange[1], 3);
        $this->assertEquals($seedProperties->targetKey, 2);
        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 18);

        SpotifySeed::setLiveness(80, 100);
        SpotifySeed::setTargetLiveness(90);
        $this->assertEquals($seedProperties->livenessRange[0], 80.00);
        $this->assertEquals($seedProperties->livenessRange[1], 100.00);
        $this->assertEquals($seedProperties->targetLiveness, 90.00);
        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 21);

        SpotifySeed::setLoudness(80, 100);
        SpotifySeed::setTargetLoudness(90);
        $this->assertEquals($seedProperties->loudnessRange[0], 80.00);
        $this->assertEquals($seedProperties->loudnessRange[1], 100.00);
        $this->assertEquals($seedProperties->targetLoudness, 90.00);
        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 24);

        SpotifySeed::setMode(0, 1);
        SpotifySeed::setTargetMode(0);
        $this->assertEquals($seedProperties->modeRange[0], 0);
        $this->assertEquals($seedProperties->modeRange[1], 1);
        $this->assertEquals($seedProperties->targetMode, 0);
        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 27);

        SpotifySeed::setPopularity(80, 100);
        SpotifySeed::setTargetPopularity(90);
        $this->assertEquals($seedProperties->popularityRange[0], 80.00);
        $this->assertEquals($seedProperties->popularityRange[1], 100.00);
        $this->assertEquals($seedProperties->targetPopularity, 90.00);
        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 30);

        SpotifySeed::setSpeechiness(80, 100);
        SpotifySeed::setTargetSpeechiness(90);
        $this->assertEquals($seedProperties->speechinessRange[0], 80.00);
        $this->assertEquals($seedProperties->speechinessRange[1], 100.00);
        $this->assertEquals($seedProperties->targetSpeechiness, 90.00);
        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 33);

        SpotifySeed::setTempo(100, 120);
        SpotifySeed::setTargetTempo(110);
        $this->assertEquals($seedProperties->tempoRange[0], 100);
        $this->assertEquals($seedProperties->tempoRange[1], 120);
        $this->assertEquals($seedProperties->targetTempo, 110);
        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 36);

        SpotifySeed::setTimeSignature(100, 120);
        SpotifySeed::setTargetTimeSignature(110);
        $this->assertEquals($seedProperties->timeSignatureRange[0], 100);
        $this->assertEquals($seedProperties->timeSignatureRange[1], 120);
        $this->assertEquals($seedProperties->targetTimeSignature, 110);
        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 39);

        SpotifySeed::setValence(80, 100);
        SpotifySeed::setTargetValence(90);
        $this->assertEquals($seedProperties->valenceRange[0], 80.00);
        $this->assertEquals($seedProperties->valenceRange[1], 100.00);
        $this->assertEquals($seedProperties->targetValence, 90.00);
        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 42);

        SpotifySeed::setTracks(['1', '2']);
        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 43);

        SpotifySeed::setGenres(['1', '2']);
        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 44);

        SpotifySeed::setArtists(['1', '2']);
        $this->assertEquals(count(SpotifySeed::getArrayForApi()), 45);
    }
}
