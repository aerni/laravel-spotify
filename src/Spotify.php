<?php

namespace Aerni\Spotify;

class Spotify
{
    protected $defaultConfig;

    public function __construct(array $defaultConfig)
    {
        $this->defaultConfig = $defaultConfig;
    }

    /**
     * Get Spotify catalog information for a single album.
     */
    public function album(string $id): PendingRequest
    {
        $endpoint = '/albums/'.$id;

        $acceptedParams = [
            'market' => $this->defaultConfig['market'],
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Get Spotify catalog information about an album’s tracks. Optional parameters can be used to limit the number of tracks returned.
     */
    public function albumTracks(string $id): PendingRequest
    {
        $endpoint = '/albums/'.$id.'/tracks/';

        $acceptedParams = [
            'limit' => null,
            'offset' => null,
            'market' => $this->defaultConfig['market'],
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Get Spotify catalog information for multiple albums identified by their Spotify IDs.
     *
     * @param  array|string  $ids
     */
    public function albums($ids): PendingRequest
    {
        $endpoint = '/albums/';

        $acceptedParams = [
            'ids' => Validator::validateArgument('ids', $ids),
            'market' => $this->defaultConfig['market'],
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Get Spotify catalog information for a single artist identified by their unique Spotify ID.
     */
    public function artist(string $id): PendingRequest
    {
        $endpoint = '/artists/'.$id;

        return new PendingRequest($endpoint);
    }

    /**
     * Get Spotify catalog information about an artist’s albums. Optional parameters can be specified in the query string to filter and sort the response.
     */
    public function artistAlbums(string $id): PendingRequest
    {
        $endpoint = '/artists/'.$id.'/albums/';

        $acceptedParams = [
            'include_groups' => null,
            'country' => $this->defaultConfig['country'],
            'limit' => null,
            'offset' => null,
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Get Spotify catalog information about an artist’s top tracks by country.
     */
    public function artistTopTracks(string $id): PendingRequest
    {
        $endpoint = '/artists/'.$id.'/top-tracks/';

        $acceptedParams = [
            'country' => $this->defaultConfig['country'],
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Get Spotify catalog information for several artists based on their Spotify IDs.
     *
     * @param  array|string  $ids
     */
    public function artists($ids): PendingRequest
    {
        $endpoint = '/artists/';

        $acceptedParams = [
            'ids' => Validator::validateArgument('ids', $ids),
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Get a single category used to tag items in Spotify (on, for example, the Spotify player’s “Browse” tab).
     */
    public function category(string $id): PendingRequest
    {
        $endpoint = '/browse/categories/'.$id;

        $acceptedParams = [
            'country' => $this->defaultConfig['country'],
            'locale' => $this->defaultConfig['locale'],
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Get a list of categories used to tag items in Spotify (on, for example, the Spotify player’s “Browse” tab).
     */
    public function categories(): PendingRequest
    {
        $endpoint = '/browse/categories/';

        $acceptedParams = [
            'country' => $this->defaultConfig['country'],
            'locale' => $this->defaultConfig['locale'],
            'limit' => null,
            'offset' => null,
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Get Spotify catalog information for a single episode identified by its unique Spotify ID.
     */
    public function episode(string $id): PendingRequest
    {
        $endpoint = '/episodes/'.$id;

        $acceptedParams = [
            'market' => $this->defaultConfig['market'],
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Get Spotify catalog information for several episodes based on their Spotify IDs.
     *
     * @param  array|string  $ids
     */
    public function episodes($ids): PendingRequest
    {
        $endpoint = '/episodes/';

        $acceptedParams = [
            'ids' => Validator::validateArgument('ids', $ids),
            'market' => $this->defaultConfig['market'],
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Get a list of new album releases featured in Spotify (shown, for example, on a Spotify player’s “Browse” tab).
     */
    public function newReleases(): PendingRequest
    {
        $endpoint = '/browse/new-releases/';

        $acceptedParams = [
            'country' => $this->defaultConfig['country'],
            'limit' => null,
            'offset' => null,
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Get the current image associated with a specific playlist.
     */
    public function playlistCoverImage(string $id): PendingRequest
    {
        $endpoint = '/playlists/'.$id.'/images/';

        return new PendingRequest($endpoint);
    }

    /**
     * Get a playlist owned by a Spotify user.
     */
    public function playlist(string $id): PendingRequest
    {
        $endpoint = '/playlists/'.$id;

        $acceptedParams = [
            'fields' => null,
            'market' => $this->defaultConfig['market'],
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Get full details of the tracks of a playlist owned by a Spotify user.
     */
    public function playlistTracks(string $id): PendingRequest
    {
        $endpoint = '/playlists/'.$id.'/tracks/';

        $acceptedParams = [
            'fields' => null,
            'limit' => null,
            'offset' => null,
            'market' => $this->defaultConfig['market'],
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Get Spotify Catalog information about artists, albums, tracks or playlists that match a keyword string.
     *
     * @param  array|string  $type
     */
    public function searchItems(string $query, $type): PendingRequest
    {
        $endpoint = '/search/';

        $acceptedParams = [
            'q' => $query,
            'type' => Validator::validateArgument('type', $type),
            'market' => $this->defaultConfig['market'],
            'limit' => null,
            'offset' => null,
            'include_external' => null,
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Get Spotify Catalog information about albums that match a keyword string.
     */
    public function searchAlbums(string $query): PendingRequest
    {
        $endpoint = '/search/';

        $acceptedParams = [
            'q' => $query,
            'type' => 'album',
            'market' => $this->defaultConfig['market'],
            'limit' => null,
            'offset' => null,
            'include_external' => null,
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Get Spotify Catalog information about artists that match a keyword string.
     */
    public function searchArtists(string $query): PendingRequest
    {
        $endpoint = '/search/';

        $acceptedParams = [
            'q' => $query,
            'type' => 'artist',
            'market' => $this->defaultConfig['market'],
            'limit' => null,
            'offset' => null,
            'include_external' => null,
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Get Spotify Catalog information about episodes that match a keyword string.
     */
    public function searchEpisodes(string $query): PendingRequest
    {
        $endpoint = '/search/';

        $acceptedParams = [
            'q' => $query,
            'type' => 'episode',
            'market' => $this->defaultConfig['market'],
            'limit' => null,
            'offset' => null,
            'include_external' => null,
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Get Spotify Catalog information about playlists that match a keyword string.
     */
    public function searchPlaylists(string $query): PendingRequest
    {
        $endpoint = '/search/';

        $acceptedParams = [
            'q' => $query,
            'type' => 'playlist',
            'market' => $this->defaultConfig['market'],
            'limit' => null,
            'offset' => null,
            'include_external' => null,
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Get Spotify Catalog information about shows that match a keyword string.
     */
    public function searchShows(string $query): PendingRequest
    {
        $endpoint = '/search/';

        $acceptedParams = [
            'q' => $query,
            'type' => 'show',
            'market' => $this->defaultConfig['market'],
            'limit' => null,
            'offset' => null,
            'include_external' => null,
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Get Spotify Catalog information about tracks that match a keyword string.
     */
    public function searchTracks(string $query): PendingRequest
    {
        $endpoint = '/search/';

        $acceptedParams = [
            'q' => $query,
            'type' => 'track',
            'market' => $this->defaultConfig['market'],
            'limit' => null,
            'offset' => null,
            'include_external' => null,
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Get Spotify catalog information for a single show identified by its unique Spotify ID.
     */
    public function show(string $id): PendingRequest
    {
        $endpoint = '/shows/'.$id;

        $acceptedParams = [
            'market' => $this->defaultConfig['market'],
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Get Spotify catalog information for several shows based on their Spotify IDs.
     *
     * @param  array|string  $ids
     */
    public function shows($ids): PendingRequest
    {
        $endpoint = '/shows/';

        $acceptedParams = [
            'ids' => Validator::validateArgument('ids', $ids),
            'market' => $this->defaultConfig['market'],
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Get Spotify catalog information about a show’s episodes.
     */
    public function showEpisodes(string $id): PendingRequest
    {
        $endpoint = '/shows/'.$id.'/episodes/';

        $acceptedParams = [
            'limit' => null,
            'offset' => null,
            'market' => $this->defaultConfig['market'],
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Get Spotify catalog information for multiple tracks based on their Spotify IDs.
     *
     * @param  array|string  $ids
     */
    public function tracks($ids): PendingRequest
    {
        $endpoint = '/tracks/';

        $acceptedParams = [
            'ids' => Validator::validateArgument('ids', $ids),
            'market' => $this->defaultConfig['market'],
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Get Spotify catalog information for a single track identified by its unique Spotify ID.
     */
    public function track(string $id): PendingRequest
    {
        $endpoint = '/tracks/'.$id;

        $acceptedParams = [
            'market' => $this->defaultConfig['market'],
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }

    /**
     * Get public profile information about a Spotify user.
     */
    public function user(string $id): PendingRequest
    {
        $endpoint = '/users/'.$id;

        return new PendingRequest($endpoint);
    }

    /**
     * Get a list of the playlists owned or followed by a Spotify user.
     */
    public function userPlaylists(string $id): PendingRequest
    {
        $endpoint = '/users/'.$id.'/playlists';

        $acceptedParams = [
            'limit' => null,
            'offset' => null,
        ];

        return new PendingRequest($endpoint, $acceptedParams);
    }
}
