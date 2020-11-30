<h1 align="center">
    <img src="https://github.com/aerni/laravel-spotify/blob/master/logo.png" width="160">
    <br>
    Laravel-Spotify
    <br>
</h1>
<h4 align="center">An easy to use Spotify Web API wrapper for Laravel 7 and 8</h4>
<p align="center">
    <a href="https://packagist.org/packages/aerni/laravel-spotify">
        <img src="https://flat.badgen.net/packagist/v/aerni/laravel-spotify" alt="Packagist version">
    </a>
    <a href="https://packagist.org/packages/aerni/laravel-spotify">
        <img src="https://flat.badgen.net/packagist/dt/aerni/laravel-spotify" alt="Packagist total downloads">
    </a>
    <a href="https://github.com/aerni/laravel-spotify/blob/master/LICENSE">
        <img src="https://flat.badgen.net/github/license/aerni/laravel-spotify" alt="GitHub license">
    </a>
    <a href="https://www.paypal.me/michaelaerni">
        <img src="https://img.shields.io/badge/PayPal-donate-blue.svg?style=flat-square" alt="PayPal donate">
    </a>
</p>
<p align="center">
    <a href="#installation">Installation</a> •
    <a href="#usage-example">Usage Example</a> •
    <a href="#optional-parameters">Optional Parameters</a> •
    <a href="#spotify-api-reference">Spotify API Reference</a> •
    <a href="#recommendations">Recommendations</a>
    <br>
    <br>
</p>

## Introduction
Laravel-Spotify makes working with the Spotify Web API a breeze. It provides straight forward methods for each endpoint and a fluent interface for optional parameters.

The package supports all Spotify Web API endpoints that are accessible with the [Client Credentials Flow](https://developer.spotify.com/documentation/general/guides/authorization-guide/#client-credentials-flow).

## Installation
Install the package using Composer. The package will automatically register itself.

```bash
composer require aerni/laravel-spotify
```

Publish the config of the package.

```bash
php artisan vendor:publish --provider="Aerni\Spotify\Providers\SpotifyServiceProvider"
```

The following config will be published to `config/spotify.php`.

```php
return [

    /*
    |--------------------------------------------------------------------------
    | Authentication
    |--------------------------------------------------------------------------
    |
    | The Client ID and Client Secret of your Spotify App.
    |
    */

    'auth' => [
        'client_id' => env('SPOTIFY_CLIENT_ID'),
        'client_secret' => env('SPOTIFY_CLIENT_SECRET'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Config
    |--------------------------------------------------------------------------
    |
    | You may define a default country, locale and market that will be used
    | for your Spotify API requests.
    |
    */

    'default_config' => [
        'country' => null,
        'locale' => null,
        'market' => null,
    ],

];
```

Set the `Client ID` and `Client Secret` of your [Spotify App](https://developer.spotify.com/dashboard) in your `.env` file.

```env
SPOTIFY_CLIENT_ID=********************************
SPOTIFY_CLIENT_SECRET=********************************
```

## Usage Example
Import the package at the top of your file. All of the following examples use the [Facade](https://laravel.com/docs/master/facades).

```php
use Spotify;
```

Search for tracks with the name `Closed on Sunday`.

```php
Spotify::searchTracks('Closed on Sunday')->get();
```

**Important:** The `get()` method acts as the final method of the fluent interface. Make sure to always call it last in the method chain to execute a request to the Spotify Web API.

## Optional Parameters
You may pass optional parameters to your requests using the fluent interface provided by this package. A common use case is to set a `limit` and `offset` to your request.

```php
Spotify::searchTracks('Closed on Sunday')->limit(50)->offset(50)->get();
```

### Parameter Methods API Reference
Consult the [Spotify Web API Reference Documentation](https://developer.spotify.com/documentation/web-api/reference/) to check which parameters are available to what endpoint.

```php
// Limit the response to a particular geographical market.
Spotify::artistAlbums('artist_id')->country('US')->get();

// Filter the query using the provided string.
Spotify::playlist('playlist_id')->fields('description, uri')->get();

// Include any relevant content that is hosted externally.
Spotify::searchTracks('query')->includeExternal('audio')->get();

// Filter the response using the provided string.
Spotify::artistAlbums('artist_id')->includeGroups('album, single, appears_on, compilation')->get();

// Set the number of track objects to be returned.
Spotify::searchTracks('query')->limit(10)->get();

// Set the index of the first track to be returned.
Spotify::searchTracks('query')->offset(10)->get();

// Limit the response to a particular geographical market.
Spotify::searchAlbums('query')->market('US')->get();

// Limit the response to a particular language.
Spotify::category('category_id')->locale('en_US')->get();

// Get results based on a specific date and time.
Spotify::featuredPlaylists()->timestamp('2020-03-02T09:00:00')->get();
```

### Resetting Defaults
You may want to reset the default setting of `country`, `locale` or `market` for a given request. You may do so by calling the corresponding parameter method with an empty argument.

```php
// This will reset the default market to nothing.
Spotify::searchTracks('query')->market()->get();
```

### Response Key
Some API responses are wrapped in a top level object like `artists` or `tracks`. If you want to directly access the content of a given top level object, you may do so by passing its key as a string to the `get()` method.

```php
// This will return the content of the tracks object.
Spotify::searchTracks('query')->get('tracks');
```

## Spotify API Reference

**Note:** Any parameter that accepts multiple values can either receive a string with comma-separated values or an array of values.

```php
// Pass a string with comma-separated values
Spotify::albums('album_id, album_id_2, album_id_3')->get();

// Or pass an array of values
Spotify::albums(['album_id', 'album_id_2', 'album_id_3'])->get();
```

### Albums
[Spotify Web API Reference on Albums](https://developer.spotify.com/documentation/web-api/reference/albums/)

```php
// Get an album by ID.
Spotify::album('album_id')->get();

// Get several albums by IDs. Provide a string or array of IDs.
Spotify::albums('album_id, album_id_2, album_id_3')->get();

// Get the tracks of an album by ID.
Spotify::albumTracks('album_id')->get();
```

### Artists
[Spotify Web API Reference on Artists](https://developer.spotify.com/documentation/web-api/reference/artists/)

```php
// Get an artist by ID.
Spotify::artist('artist_id')->get();

// Get several artists by IDs. Provide a string or array of IDs.
Spotify::artists('artist_id, artist_id_2, artist_id_3')->get();

// Get albums of an artist by ID.
Spotify::artistAlbums('artist_id')->get();

// Get the artist's top tracks by ID.
Spotify::artistTopTracks('artist_id')->get();

// Get an artist's related artists by ID.
Spotify::artistRelatedArtists('artist_id')->get();
```

### Browse
[Spotify Web API Reference on Browse](https://developer.spotify.com/documentation/web-api/reference/browse/)

```php
// Get a category by ID.
Spotify::category('category_id')->get();

// Get a category's playlists by ID.
Spotify::categoryPlaylists('category_id')->get();

// Get a list of categories.
Spotify::categories()->get();

// Get a list of featured playlists.
Spotify::featuredPlaylists()->get();

// Get a list of new releases.
Spotify::newReleases()->get();

// Get available genre seeds.
Spotify::availableGenreSeeds()->get();

// Get recommendations based on a seed.
Spotify::recommendations($seed)->get();
```

### Episodes
[Spotify Web API Reference on Episodes](https://developer.spotify.com/documentation/web-api/reference/episodes/)

```php
// Get an episode by ID.
Spotify::episode('episode_id')->get();

// Get several episodes by IDs. Provide a string or array of IDs.
Spotify::episodes('episode_id, episode_id_2, episode_id_3')->get();
```

### Playlists
[Spotify Web API Reference on Playlists](https://developer.spotify.com/documentation/web-api/reference/playlists/)

```php
// Get a playlist by ID.
Spotify::playlist('playlist_id')->get();

// Get a playlist's tracks by ID.
Spotify::playlistTracks('playlist_id')->get();

// Get a playlist's cover image by ID.
Spotify::playlistCoverImage('playlist_id')->get();
```

### Search
[Spotify Web API Reference on Search](https://developer.spotify.com/documentation/web-api/reference/search/search/)

```php
// Search items by query. Provide a string or array to the second parameter.
Spotify::searchItems('query', 'album, artist, playlist, track')->get();

// Search albums by query.
Spotify::searchAlbums('query')->get();

// Search artists by query.
Spotify::searchArtists('query')->get();

// Search episodes by query.
Spotify::searchEpisodes('query')->get();

// Search playlists by query.
Spotify::searchPlaylists('query')->get();

// Search shows by query.
Spotify::searchShows('query')->get();

// Search tracks by query.
Spotify::searchTracks('query')->get();
```

### Shows
[Spotify Web API Reference on Shows](https://developer.spotify.com/documentation/web-api/reference/shows/)

```php
// Get a show by ID.
Spotify::show('show_id')->get();

// Get several shows by IDs. Provide a string or array of IDs.
Spotify::shows('show_id, show_id_2, show_id_3')->get();

// Get the episodes of a show by ID.
Spotify::showEpisodes('show_id')->get();
```

### Tracks
[Spotify Web API Reference on Tracks](https://developer.spotify.com/documentation/web-api/reference/tracks/)

```php
// Get a track by ID.
Spotify::track('track_id')->get();

// Get several tracks by IDs. Provide a string or array of IDs.
Spotify::tracks('track_id, track_id_2, track_id_3')->get();

// Get audio analysis for a track by ID.
Spotify::audioAnalysisForTrack('track_id')->get();

// Get audio features for a track by ID.
Spotify::audioFeaturesForTrack('track_id')->get();

// Get audio features for several tracks by ID. Provide a string or array of IDs.
Spotify::audioFeaturesForTracks('track_id, track_id_2, track_id_3')->get();
```

### User's Profile
[Spotify Web API Reference on User's Profile](https://developer.spotify.com/documentation/web-api/reference/users-profile/)

```php
// Get a user's profile
Spotify::user('user_id')->get();

// Get a list of a user's playlists
Spotify::userPlaylists('user_id')->get();
```

## Recommendations
You can get personalized tracks using the [recommendations endpoint](https://developer.spotify.com/documentation/web-api/reference/browse/get-recommendations) by seeding artists, genres and tracks along with a bunch of adjustable properties such as energy, key and danceability.

### Usage Example
Import the `SpotifySeed` class. All of the following examples use the [Facade](https://laravel.com/docs/master/facades).

```php
use SpotifySeed;
```

Build your personalized `$seed`. You may chain as many methods as you want.

```php
$seed = SpotifySeed::setGenres(['gospel', 'pop', 'funk'])
    ->setTargetValence(1.00)
    ->setSpeechiness(0.3, 0.9)
    ->setLiveness(0.3, 1.0);
```

Get your personalized tracks by passing the `$seed` to the `recommendations()` method.

```php
Spotify::recommendations($seed)->get();
```

### SpotifySeed API Reference
**Note:** Any parameter that accepts multiple values can either receive a string with comma-separated values or an array of values.

**Add artists, genres and tracks to your seed:**

```php
// Add an artist by ID.
SpotifySeed::addArtist('artist_id');

// Add several artists by IDs. Provide a string or array of IDs.
SpotifySeed::addArtists('artist_id_1, artist_id_2, artist_id_3');

// Set artists by IDs. Provide a string or array of IDs. This overwrites previously added artists.
SpotifySeed::setArtists('artist_id_1, artist_id_2, artist_id_3');

// Add a genre by ID.
SpotifySeed::addGerne('gerne_id');

// Add several genres by IDs. Provide a string or array of IDs.
SpotifySeed::addGenres('gerne_id_1, gerne_id_2, gerne_id_3');

// Set gernes by IDs. Provide a string or array of IDs. This overwrites previously added genres.
SpotifySeed::setGenres('genre_id_1, genre_id_2, genre_id_3');

// Add a track by ID.
SpotifySeed::addTrack('track_id');

// Add several tracks by IDs. Provide a string or array of IDs.
SpotifySeed::addTracks('track_id_1, track_id_2, track_id_3');

// Set tracks by IDs. Provide a string or array of IDs. This overwrites previously added tracks.
SpotifySeed::setTracks('track_id_1, track_id_2, track_id_3');
```

**Add tunable properties to your seed:**

```php
SpotifySeed::setAcousticness(float $min, float $max);
SpotifySeed::setTargetAcousticness(float $target);

SpotifySeed::setDanceability(float $min, float $max);
SpotifySeed::setTargetDanceability(float $target);

SpotifySeed::setDuration(int $min, int $max);
SpotifySeed::setTargetDuration(int $target);

SpotifySeed::setEnergy(float $min, float $max);
SpotifySeed::setTargetEnergy(float $target);

SpotifySeed::setInstrumentalness(float $min, float $max);
SpotifySeed::setTargetInstrumentalness(float $target);

SpotifySeed::setKey(int $min, int $max);
SpotifySeed::setTargetKey(int $target);

SpotifySeed::setLiveness(float $min, float $max);
SpotifySeed::setTargetLiveness(float $target);

SpotifySeed::setLoudness(float $min, float $max);
SpotifySeed::setTargetLoudness(float $target);

SpotifySeed::setMode(int $min, int $max);
SpotifySeed::setTargetMode(int $target);

SpotifySeed::setPopularity(float $min, float $max);
SpotifySeed::setTargetPopularity(float $target);

SpotifySeed::setSpeechiness(float $min, float $max);
SpotifySeed::setTargetSpeechiness(float $target);

SpotifySeed::setTempo(int $min, int $max);
SpotifySeed::setTargetTempo(int $target);

SpotifySeed::setTimeSignature(int $min, int $max);
SpotifySeed::setTargetTimeSignature(int $target);

SpotifySeed::setValence(float $min, float $max);
SpotifySeed::setTargetValence(float $target);
```

## Tests
Run the tests like this:

```bash
vendor/bin/phpunit
```
