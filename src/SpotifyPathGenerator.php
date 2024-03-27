<?php

namespace Aerni\Spotify;

class SpotifyPathGenerator
{
    /**
     * Generate a URI format for an album.
     */
    public static function getAlbumUri(string $id): string
    {
        return 'spotify:album:'.$id;
    }

    /**
     * Generate a URI format for an artist.
     */
    public static function getArtistUri(string $id): string
    {
        return 'spotify:artist:'.$id;
    }

    /**
     * Generate a URI format for a playlist.
     */
    public static function getPlaylistUri(string $id): string
    {
        return 'spotify:user:spotify:playlist:'.$id;
    }

    /**
     * Generate a URI format for a track.
     */
    public static function getTrackUri(string $id): string
    {
        return 'spotify:track:'.$id;
    }

    /**
     * Generate a URL for an album.
     */
    public static function getAlbumUrl(string $id): string
    {
        return 'https://open.spotify.com/album/'.$id;
    }

    /**
     * Generate a URL for an artist.
     */
    public static function getArtistUrl(string $id): string
    {
        return 'https://open.spotify.com/artist/'.$id;
    }

    /**
     * Generate a URL for a playlist.
     */
    public static function getPlaylistUrl(string $id): string
    {
        return 'https://open.spotify.com/playlist/'.$id;
    }

    /**
     * Generate a URL for a track.
     */
    public static function getTrackUrl(string $id): string
    {
        return 'https://open.spotify.com/track/'.$id;
    }
}
