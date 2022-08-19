<?php

namespace robuust\youtube;

use Craft;
use craft\events\RegisterGqlDirectivesEvent;
use craft\services\Gql;
use robuust\youtube\gql\directives\YoutubeCode;
use robuust\youtube\twig\Extension as TwigExtension;
use yii\base\Event;

/**
 * YouTube Code module.
 */
class Module extends \yii\base\Module
{
    /**
     * Initializes the module.
     */
    public function init()
    {
        parent::init();

        if (Craft::$app->getRequest()->getIsSiteRequest()) {
            Craft::$app->getView()->registerTwigExtension(new TwigExtension());
        }

        Event::on(Gql::class, Gql::EVENT_REGISTER_GQL_DIRECTIVES, function (RegisterGqlDirectivesEvent $event) {
            $event->directives[] = YoutubeCode::class;
        });
    }
}
