<?php

namespace robuust\youtube\twig;

use robuust\youtube\twig\filters\YoutubeFilter;
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
            new TwigFilter('youtubeCode', [YoutubeFilter::class, 'extractCode']),
        ];
    }
}
