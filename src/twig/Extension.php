<?php

namespace robuust\youtube\twig;

use robuust\youtube\twig\filters\YoutubeCode;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

/**
 * YouTube Twig extension.
 */
class Extension extends AbstractExtension
{
    /**
     * {@inheritdoc}
     */
    public function getFilters(): array
    {
        return [
            new TwigFilter('youtubeCode', [YoutubeCode::class, 'extractCode']),
        ];
    }
}
