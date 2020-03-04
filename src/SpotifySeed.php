<?php

namespace Aerni\Spotify;

class SpotifySeed
{
    public $artists = [];
    public $genres = [];
    public $tracks = [];

    public $acousticnessRange = [];
    public $targetAcousticness;

    public $danceabilityRange = [];
    public $targetDanceability;

    public $durationRange = [];
    public $targetDuration;

    public $energyRange = [];
    public $targetEnergy;

    public $instrumentalnessRange = [];
    public $targetInstrumentalness;

    public $keyRange = [];
    public $targetKey;

    public $livenessRange = [];
    public $targetLiveness;

    public $loudnessRange = [];
    public $targetLoudness;

    public $modeRange = [];
    public $targetMode;

    public $popularityRange = [];
    public $targetPopularity;

    public $speechinessRange = [];
    public $targetSpeechiness;

    public $tempoRange = [];
    public $targetTempo;

    public $timeSignatureRange = [];
    public $targetTimeSignature;

    public $valenceRange = [];
    public $targetValence;

    /**
     * SpotifySeed constructor.
     */
    public function __construct()
    {
        $this->artists = collect($this->artists);
        $this->genres = collect($this->genres);
        $this->tracks = collect($this->tracks);
    }

    /**
     * Add an artist to the artists seeds.
     *
     * @param string $id
     * @return SpotifySeed
     */
    public function addArtist(string $id): self
    {
        if (! $this->artists->contains($id)) {
            $this->artists->push($id);
        }

        return $this;
    }

    /**
     * Add artists to the artists seeds.
     *
     * @param array|string $ids
     * @return SpotifySeed
     */
    public function addArtists($ids): self
    {
        if (is_array($ids)) {
            $ids = collect($ids);
        }

        if (is_string($ids)) {
            $ids = str_replace(' ', '', $ids);
            $ids = collect(explode(',', $ids));
        }

        $ids->each(function ($item, $key) {
            $this->addArtist($item);
        });

        return $this;
    }

    /**
     * Set artists as seed.
     *
     * @param array|string $ids
     * @return SpotifySeed
     */
    public function setArtists($ids): self
    {
        if (is_array($ids)) {
            $this->artists = collect($ids);
        }

        if (is_string($ids)) {
            $ids = str_replace(' ', '', $ids);
            $this->artists = collect(explode(',', $ids));
        }

        return $this;
    }

    /**
     * Add genre to the genres seeds.
     *
     * @param string $id
     * @return SpotifySeed
     */
    public function addGenre(string $id): self
    {
        if (! $this->genres->contains($id)) {
            $this->genres->push($id);
        }

        return $this;
    }

    /**
     * Add genres to the genres seeds.
     *
     * @param array|string $ids
     * @return SpotifySeed
     */
    public function addGenres($ids): self
    {
        if (is_array($ids)) {
            $ids = collect($ids);
        }

        if (is_string($ids)) {
            $ids = str_replace(' ', '', $ids);
            $ids = collect(explode(',', $ids));
        }

        $ids->map(function ($item, $key) {
            $this->addGenre($item);
        });

        return $this;
    }

    /**
     * Set genres as seed.
     *
     * @param array|string $ids
     * @return SpotifySeed
     */
    public function setGenres($ids): self
    {
        if (is_array($ids)) {
            $this->genres = collect($ids);
        }

        if (is_string($ids)) {
            $ids = str_replace(' ', '', $ids);
            $this->genres = collect(explode(',', $ids));
        }

        return $this;
    }

    /**
     * Add track to the tracks seeds.
     *
     * @param string $id
     * @return SpotifySeed
     */
    public function addTrack(string $id): self
    {
        if (! $this->tracks->contains($id)) {
            $this->tracks->push($id)->toArray();
        }

        return $this;
    }

    /**
     * Add tracks to the tracks seeds.
     *
     * @param array|string $ids
     * @return SpotifySeed
     */
    public function addTracks($ids): self
    {
        if (is_array($ids)) {
            $ids = collect($ids);
        }

        if (is_string($ids)) {
            $ids = str_replace(' ', '', $ids);
            $ids = collect(explode(',', $ids));
        }

        $ids->map(function ($item, $key) {
            $this->addTrack($item);
        });

        return $this;
    }

    /**
     * Set tracks as seed.
     *
     * @param array|string $ids
     * @return SpotifySeed
     */
    public function setTracks($ids): self
    {
        if (is_array($ids)) {
            $this->tracks = collect($ids);
        }

        if (is_string($ids)) {
            $ids = str_replace(' ', '', $ids);
            $this->tracks = collect(explode(',', $ids));
        }

        return $this;
    }

    /**
     * Set acousticness range.
     *
     * @param float $min
     * @param float $max
     * @return SpotifySeed
     */
    public function setAcousticness(float $min, float $max): self
    {
        $this->acousticnessRange = [$min, $max];

        return $this;
    }

    /**
     * Set target acousticness.
     *
     * @param float $target
     * @return SpotifySeed
     */
    public function setTargetAcousticness(float $target): self
    {
        $this->targetAcousticness = $target;

        return $this;
    }

    /**
     * Set danceability range.
     *
     * @param float $min
     * @param float $max
     * @return SpotifySeed
     */
    public function setDanceability(float $min, float $max): self
    {
        $this->danceabilityRange = [$min, $max];

        return $this;
    }

    /**
     * Set target danceability.
     *
     * @param float $target
     * @return SpotifySeed
     */
    public function setTargetDanceability(float $target): self
    {
        $this->targetDanceability = $target;

        return $this;
    }

    /**
     * Set duration range.
     *
     * @param int $min
     * @param int $max
     * @return SpotifySeed
     */
    public function setDuration(int $min, int $max): self
    {
        $this->durationRange = [$min, $max];

        return $this;
    }

    /**
     * Set target duration.
     *
     * @param int $target
     * @return SpotifySeed
     */
    public function setTargetDuration(int $target): self
    {
        $this->targetDuration = $target;

        return $this;
    }

    /**
     * Set energy range.
     *
     * @param float $min
     * @param float $max
     * @return SpotifySeed
     */
    public function setEnergy(float $min, float $max): self
    {
        $this->energyRange = [$min, $max];

        return $this;
    }

    /**
     * Set target energy.
     *
     * @param float $target
     * @return SpotifySeed
     */
    public function setTargetEnergy(float $target): self
    {
        $this->targetEnergy = $target;

        return $this;
    }

    /**
     * Set instrumentalness range.
     *
     * @param float $min
     * @param float $max
     * @return SpotifySeed
     */
    public function setInstrumentalness(float $min, float $max): self
    {
        $this->instrumentalnessRange = [$min, $max];

        return $this;
    }

    /**
     * Set target instrumentalness.
     *
     * @param float $target
     * @return SpotifySeed
     */
    public function setTargetInstrumentalness(float $target): self
    {
        $this->targetInstrumentalness = $target;

        return $this;
    }

    /**
     * Set key range.
     *
     * @param int $min
     * @param int $max
     * @return SpotifySeed
     */
    public function setKey(int $min, int $max): self
    {
        $this->keyRange = [$min, $max];

        return $this;
    }

    /**
     * Set target key.
     *
     * @param int $target
     * @return SpotifySeed
     */
    public function setTargetKey(int $target): self
    {
        $this->targetKey = $target;

        return $this;
    }

    /**
     * Set liveness range.
     *
     * @param float $min
     * @param float $max
     * @return SpotifySeed
     */
    public function setLiveness(float $min, float $max): self
    {
        $this->livenessRange = [$min, $max];

        return $this;
    }

    /**
     * Set target liveness.
     *
     * @param float $target
     * @return SpotifySeed
     */
    public function setTargetLiveness(float $target): self
    {
        $this->targetLiveness = $target;

        return $this;
    }

    /**
     * Set loudness range.
     *
     * @param float $min
     * @param float $max
     * @return SpotifySeed
     */
    public function setLoudness(float $min, float $max): self
    {
        $this->loudnessRange = [$min, $max];

        return $this;
    }

    /**
     * Set target loudness.
     *
     * @param float $target
     * @return SpotifySeed
     */
    public function setTargetLoudness(float $target): self
    {
        $this->targetLoudness = $target;

        return $this;
    }

    /**
     * Set mode range.
     *
     * @param int $min
     * @param int $max
     * @return SpotifySeed
     */
    public function setMode(int $min, int $max): self
    {
        $this->modeRange = [$min, $max];

        return $this;
    }

    /**
     * Set target mode.
     *
     * @param int $target
     * @return SpotifySeed
     */
    public function setTargetMode(int $target): self
    {
        $this->targetMode = $target;

        return $this;
    }

    /**
     * Set popularity range.
     *
     * @param float $min
     * @param float $max
     * @return SpotifySeed
     */
    public function setPopularity(float $min, float $max): self
    {
        $this->popularityRange = [$min, $max];

        return $this;
    }

    /**
     * Set target popularity.
     *
     * @param float $target
     * @return SpotifySeed
     */
    public function setTargetPopularity(float $target): self
    {
        $this->targetPopularity = $target;

        return $this;
    }

    /**
     * Set speechiness range.
     *
     * @param float $min
     * @param float $max
     * @return SpotifySeed
     */
    public function setSpeechiness(float $min, float $max): self
    {
        $this->speechinessRange = [$min, $max];

        return $this;
    }

    /**
     * Set target speechiness.
     *
     * @param float $target
     * @return SpotifySeed
     */
    public function setTargetSpeechiness(float $target): self
    {
        $this->targetSpeechiness = $target;

        return $this;
    }

    /**
     * Set tempo range.
     *
     * @param int $min
     * @param int $max
     * @return SpotifySeed
     */
    public function setTempo(int $min, int $max): self
    {
        $this->tempoRange = [$min, $max];

        return $this;
    }

    /**
     * Set target tempo.
     *
     * @param int $target
     * @return SpotifySeed
     */
    public function setTargetTempo(int $target): self
    {
        $this->targetTempo = $target;

        return $this;
    }

    /**
     * Set time signature range.
     *
     * @param int $min
     * @param int $max
     * @return SpotifySeed
     */
    public function setTimeSignature(int $min, int $max): self
    {
        $this->timeSignatureRange = [$min, $max];

        return $this;
    }

    /**
     * Set target time signature.
     *
     * @param int $target
     * @return SpotifySeed
     */
    public function setTargetTimeSignature(int $target): self
    {
        $this->targetTimeSignature = $target;

        return $this;
    }

    /**
     * Set valence range.
     *
     * @param float $min
     * @param float $max
     * @return SpotifySeed
     */
    public function setValence(float $min, float $max): self
    {
        $this->valenceRange = [$min, $max];

        return $this;
    }

    /**
     * Set target valence.
     *
     * @param float $target
     * @return SpotifySeed
     */
    public function setTargetValence(float $target): self
    {
        $this->targetValence = $target;

        return $this;
    }

    /**
     * Collect all the ranges in an array.
     *
     * @return array
     */
    private function getRangesArray(): array
    {
        return [
            'acousticness' => $this->acousticnessRange,
            'danceability' => $this->danceabilityRange,
            'duration_ms' => $this->durationRange,
            'energy' => $this->energyRange,
            'instrumentalness' => $this->instrumentalnessRange,
            'key' => $this->keyRange,
            'liveness' => $this->livenessRange,
            'loudness' => $this->loudnessRange,
            'mode' => $this->modeRange,
            'popularity' => $this->popularityRange,
            'speechiness' => $this->speechinessRange,
            'tempo' => $this->tempoRange,
            'time_signature' => $this->timeSignatureRange,
            'valence' => $this->valenceRange,
        ];
    }

    /**
     * Collect all the targets in an array.
     *
     * @return array
     */
    private function getTargetsArray(): array
    {
        return [
            'acousticness' => $this->targetAcousticness,
            'danceability' => $this->targetDanceability,
            'duration_ms' => $this->targetDuration,
            'energy' => $this->targetEnergy,
            'instrumentalness' => $this->targetInstrumentalness,
            'key' => $this->targetKey,
            'liveness' => $this->targetLiveness,
            'loudness' => $this->targetLoudness,
            'mode' => $this->targetMode,
            'popularity' => $this->targetPopularity,
            'speechiness' => $this->targetSpeechiness,
            'tempo' => $this->targetTempo,
            'time_signature' => $this->targetTimeSignature,
            'valence' => $this->targetValence,
        ];
    }

    /**
     * Get the final array for the API request.
     *
     * @return array
     */
    public function getArrayForApi(): array
    {
        $collection = collect([]);

        if ($this->artists->count() > 0) {
            $collection->put('seed_artists', $this->artists->unique()->implode(','));
        }

        if ($this->genres->count() > 0) {
            $collection->put('seed_genres', $this->genres->unique()->implode(','));
        }

        if ($this->tracks->count() > 0) {
            $collection->put('seed_tracks', $this->tracks->unique()->implode(','));
        }

        $ranges = $this->getRangesArray();

        foreach ($ranges as $field => $range) {
            if (count($range) > 0) {
                $collection->put('min_'.$field, $range[0]);
                $collection->put('max_'.$field, $range[1]);
            }
        }

        $targets = $this->getTargetsArray();

        foreach ($targets as $field => $target) {
            if (! is_null($target)) {
                $collection->put('target_'.$field, $target);
            }
        }

        return $collection->toArray();
    }
}
