<?php

namespace robuust\youtube\gql\directives;

use craft\gql\base\Directive;
use craft\gql\GqlEntityRegistry;
use GraphQL\Language\DirectiveLocation;
use GraphQL\Type\Definition\Directive as GqlDirective;
use GraphQL\Type\Definition\ResolveInfo;
use robuust\youtube\twig\filters\YoutubeCode as YoutubeCodeFilter;

class YoutubeCode extends Directive
{
    /**
     * {@inheritdoc}
     */
    public static function create(): GqlDirective
    {
        if ($type = GqlEntityRegistry::getEntity(self::name())) {
            return $type;
        }

        $type = GqlEntityRegistry::createEntity(static::name(), new self([
            'name' => static::name(),
            'locations' => [
                DirectiveLocation::FIELD,
            ],
            'description' => 'Extract Youtube Code from URL.',
            'args' => [],
        ]));

        return $type;
    }

    /**
     * {@inheritdoc}
     */
    public static function name(): string
    {
        return 'youtubeCode';
    }

    /**
     * {@inheritdoc}
     */
    public static function apply(mixed $source, mixed $value, array $arguments, ResolveInfo $resolveInfo): mixed
    {
        return YoutubeCodeFilter::extractCode($value);
    }
}
