![GitHub release (latest by date)](https://img.shields.io/github/v/release/aerni/laravel-spotify?style=flat-square)
![Packagist](https://img.shields.io/packagist/dt/aerni/laravel-spotify?style=flat-square)
![Travis (.com)](https://img.shields.io/travis/com/aerni/laravel-spotify?style=flat-square)
[![StyleCI](https://github.styleci.io/repos/244674855/shield?branch=master)](https://github.styleci.io/repos/244674855)
![GitHub](https://img.shields.io/github/license/aerni/laravel-spotify?style=flat-square)

# An easy to use Spotify Web API wrapper for Laravel
This Laravel package makes working with the Spotify Web API a breeze. It provides straight forward methods for each endpoint and a fluent interface for optional parameters.

The package supports all Spotify Web API endpoints that are accessible with the [Client Credentials Flow](https://developer.spotify.com/documentation/general/guides/authorization-guide/#client-credentials-flow).

# Installation
Install the package using Composer. The package will automatically register itself.

```bash
composer require aerni/laravel-spotify
```

# Configuration
Publish the config of this package.

```bash
php artisan vendor:publish --provider="Aerni\Spotify\SpotifyServiceProvider"
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
    | You may provide a default config which will be used for every API request.
    |
    */

    'default_config' => [
        'country' => env('SPOTIFY_DEFAULT_COUNTRY'),
        'locale' => env('SPOTIFY_DEFAULT_LOCALE'),
        'market' => env('SPOTIFY_DEFAULT_MARKET'),
    ],

];
```

Create a new App in the [Spotify Developers Dashboard](https://developer.spotify.com/dashboard) and set the `Client ID` and `Client Secret` in your `.env` file. You may also set default values for `country`, `locale` and `market`. They will be passed as optional parameters to every endpoint that support the corresponding parameter.

```env
SPOTIFY_CLIENT_ID=********************************
SPOTIFY_CLIENT_SECRET=********************************
SPOTIFY_DEFAULT_COUNTRY=US
SPOTIFY_DEFAULT_LOCALE=en_US
SPOTIFY_DEFAULT_MARKET=US
```

# Basic Usage
Import the package at the top of your file. All of the following examples make use of [Laravel Facades](https://laravel.com/docs/master/facades).

```php
use Spotify;
```

## Example
Search for tracks with the name `Closed on Sunday`.

```php
Spotify::searchTracks('Closed on Sunday')->get();
```

> **Important:** The `get()` method acts as the `final method` of the fluent interface. To make a request to the Spotify Web API, you always need to call `get()` at the end of the method chain.

# Advanced Usage
You may pass optional parameters to your request using the fluent interface provided by this package. A common use case is to set a `limit` and `offset`.

## Example
Search for tracks with the name `Closed on Sunday` and set the `limit` and `offset` to `50`. You may chain as many parameter methods as you want.

```php
Spotify::searchTracks('Closed on Sunday')->limit(50)->offset(50)->get();
```

## Available Parameter Methods
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

## Resetting Defaults
You may want to reset the default setting of `country`, `locale` or `market` for a given request. You may do so by calling the corresponding parameter method with an empty argument.

```php
// This will reset the default market to nothing.
Spotify::searchTracks('query')->market()->get();
```

## Response Key
Some API responses are wrapped in a top level object like `artists` or `tracks`. If you want to directly access the content of a given top level object, you may do so by passing its key as a string to the `get()` method.

```php
// This will return the content of the tracks object.
Spotify::searchTracks('query')->get('tracks');
```

# API Usage

## Parameters With Multiple Values
Any parameter that expects multiple values can either receive a string with comma-separated values or an array of values.

```php
// Pass a string with comma-separated values
Spotify::albums('album_id, album_id_2, album_id_3')->get();

// Or pass an array of values
Spotify::albums(['album_id', 'album_id_2', 'album_id_3'])->get();
```

## Albums
[Spotify Web API Reference on Albums](https://developer.spotify.com/documentation/web-api/reference/albums/)

```php
// Get an album by ID.
Spotify::album('album_id')->get();

// Get several albums by IDs. Provide a string or array of IDs.
Spotify::albums('album_id, album_id_2, album_id_3')->get();

// Get the tracks of an album by ID.
Spotify::albumTracks('album_id')->get();
```

## Artists
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

## Browse
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

## Playlists
[Spotify Web API Reference on Playlists](https://developer.spotify.com/documentation/web-api/reference/playlists/)

```php
// Get a playlist by ID.
Spotify::playlist('playlist_id')->get();

// Get a playlist's tracks by ID.
Spotify::playlistTracks('playlist_id')->get();

// Get a playlist's cover image by ID.
Spotify::playlistCoverImage('playlist_id')->get();
```

## Search
[Spotify Web API Reference on Search](https://developer.spotify.com/documentation/web-api/reference/search/search/)

```php
// Search items by query. Provide a string or array to the second parameter.
Spotify::searchItems('query', 'album, artist, playlist, track')->get();

// Search albums by query.
Spotify::searchAlbums('query')->get();

// Search artists by query.
Spotify::searchArtists('query')->get();

// Search playlists by query.
Spotify::searchPlaylists('query')->get();

// Search tracks by query.
Spotify::searchTracks('query')->get();
```

## Tracks
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

# Get Recommendations Based on Seeds
Get personalized tracks using the [Recommendations Endpoint](https://developer.spotify.com/documentation/web-api/reference/browse/get-recommendations) by seeding artists, genres and tracks along with a bunch of adjustable properties such as energy, key and danceability.

## Example
Build your seed using the `SpotifySeed` class. You may chain as many methods as you want.

```php
// Import the class
use \Aerni\Spotify\SpotifySeed;

// Build your personalized seed
$seed = (new SpotifySeed)
    ->setGenres(['gospel', 'pop', 'funk'])
    ->setTargetValence(1.00)
    ->setSpeechiness(0.3, 0.9)
    ->setLiveness(0.3, 1.0);

// Pass the seed to the recommendations method
$tracks = Spotify::recommendations($seed)->get();
```

## SpotifySeed API

**Add artists, genres and tracks to your seed:**

```php
// Add an artist by ID.
$seed->addArtist('artist_id');

// Add several artists by IDs. Provide a string or array of IDs.
$seed->addArtists('artist_id_1, artist_id_2, artist_id_3');

// Set artists by IDs. Provide a string or array of IDs. This overwrites previously added artists.
$seed->setArtists('artist_id_1, artist_id_2, artist_id_3');

// Add a genre by ID.
$seed->addGerne('gerne_id');

// Add several genres by IDs. Provide a string or array of IDs.
$seed->addGenres('gerne_id_1, gerne_id_2, gerne_id_3');

// Set gernes by IDs. Provide a string or array of IDs. This overwrites previously added genres. 
$seed->setGenres('genre_id_1, genre_id_2, genre_id_3');

//  Add a track by ID.
$seed->addTrack('track_id');

// Add several tracks by IDs. Provide a string or array of IDs.
$seed->addTracks('track_id_1, track_id_2, track_id_3');

// Set tracks by IDs. Provide a string or array of IDs. This overwrites previously added tracks.
$seed->setTracks('track_id_1, track_id_2, track_id_3');
```

**Add tunable properties to your seed:**

```php
$seed->setAcousticness(float $min, float $max);
$seed->setTargetAcousticness(float $target);

$seed->setDanceability(float $min, float $max);
$seed->setTargetDanceability(float $target);

$seed->setDuration(int $min, int $max);
$seed->setTargetDuration(int $target);

$seed->setEnergy(float $min, float $max);
$seed->setTargetEnergy(float $target);

$seed->setInstrumentalness(float $min, float $max);
$seed->setTargetInstrumentalness(float $target);

$seed->setKey(int $min, int $max);
$seed->setTargetKey(int $target);

$seed->setLiveness(float $min, float $max);
$seed->setTargetLiveness(float $target);

$seed->setLoudness(float $min, float $max);
$seed->setTargetLoudness(float $target);

$seed->setMode(int $min, int $max);
$seed->setTargetMode(int $target);

$seed->setPopularity(float $min, float $max);
$seed->setTargetPopularity(float $target);

$seed->setSpeechiness(float $min, float $max);
$seed->setTargetSpeechiness(float $target);

$seed->setTempo(int $min, int $max);
$seed->setTargetTempo(int $target);

$seed->setTimeSignature(int $min, int $max);
$seed->setTargetTimeSignature(int $target);

$seed->setValence(float $min, float $max);
$seed->setTargetValence(float $target);
```

# Testing
Run the tests like this:

```bash
vendor/bin/phpunit
```
