<?php

namespace Aerni\Spotify;

class SpotifyPathGenerator
{
    /**
     * Generate a URI format for an album.
     *
     * @param string $id
     * @return string
     */
    public static function getAlbumUri(string $id): string
    {
        return 'spotify:album:'.$id;
    }

    /**
     * Generate a URI format for an artist.
     *
     * @param string $id
     * @return string
     */
    public static function getArtistUri(string $id): string
    {
        return 'spotify:artist:'.$id;
    }

    /**
     * Generate a URI format for a playlist.
     *
     * @param string $id
     * @return string
     */
    public static function getPlaylistUri(string $id): string
    {
        return 'spotify:user:spotify:playlist:'.$id;
    }

    /**
     * Generate a URI format for a track.
     *
     * @param string $id
     * @return string
     */
    public static function getTrackUri(string $id): string
    {
        return 'spotify:track:'.$id;
    }

    /**
     * Generate a URL for an album.
     *
     * @param string $id
     * @return string
     */
    public static function getAlbumUrl(string $id): string
    {
        return 'https://open.spotify.com/album/'.$id;
    }

    /**
     * Generate a URL for an artist.
     *
     * @param string $id
     * @return string
     */
    public static function getArtistUrl(string $id): string
    {
        return 'https://open.spotify.com/artist/'.$id;
    }

    /**
     * Generate a URL for a playlist.
     *
     * @param string $id
     * @return string
     */
    public static function getPlaylistUrl(string $id): string
    {
        return 'https://open.spotify.com/playlist/'.$id;
    }

    /**
     * Generate a URL for a track.
     *
     * @param string $id
     * @return string
     */
    public static function getTrackUrl(string $id): string
    {
        return 'https://open.spotify.com/track/'.$id;
    }
}
