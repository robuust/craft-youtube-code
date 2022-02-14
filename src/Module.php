<?php

namespace robuust\youtube;

use Craft;
use robuust\youtube\twig\Extension as TwigExtension;

/**
 * YouTube module.
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
    }
}
