<?php

namespace Application\Delegator;

use Zend\I18n\Translator\Resources;
use Zend\ServiceManager\DelegatorFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class TranslatorDelegator implements DelegatorFactoryInterface
{
    public function createDelegatorWithName(
        ServiceLocatorInterface $services,
        $name,
        $requestedName,
        $callback
    ) {
        $translator = $callback();
        $translator->addTranslationFilePattern(
            'phpArray',
            Resources::getBasePath(),
            Resources::getPatternForValidator(),
            'myApp'
        );

        $translator->addTranslationFilePattern(
            'gettext',
            Resources::getBasePath(),
            '%s.mo'
        );

        return $translator;
    }
}
