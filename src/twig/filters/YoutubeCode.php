<?php

namespace robuust\youtube\twig\filters;

/**
 * Youtube Code filter.
 */
class YoutubeCode
{
    /**
     * Extracts youtube code from given URL.
     * Here is a sample of the URLs this regex matches: (there can be more content after the given URL that will be ignored).
     *
     * http://youtu.be/dQw4w9WgXcQ
     * http://www.youtube.com/embed/dQw4w9WgXcQ
     * http://www.youtube.com/watch?v=dQw4w9WgXcQ
     * http://www.youtube.com/?v=dQw4w9WgXcQ
     * http://www.youtube.com/v/dQw4w9WgXcQ
     * http://www.youtube.com/e/dQw4w9WgXcQ
     * http://www.youtube.com/user/username#p/u/11/dQw4w9WgXcQ
     * http://www.youtube.com/sandalsResorts#p/c/54B8C800269D7C1B/0/dQw4w9WgXcQ
     * http://www.youtube.com/watch?feature=player_embedded&v=dQw4w9WgXcQ
     * http://www.youtube.com/?feature=player_embedded&v=dQw4w9WgXcQ
     *
     * @param string $url
     *
     * @return string
     */
    public static function extractCode($url)
    {
        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);

        return $match[1] ?? null;
    }
}
