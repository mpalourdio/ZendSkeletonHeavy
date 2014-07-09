<?php

namespace Application\Factory;

use Application\Listener\IntlListener;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class IntlListenerFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param  ServiceLocatorInterface $serviceLocator
     * @return IntlListener
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new IntlListener($serviceLocator->get('translator'));
    }
}
