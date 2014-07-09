<?php

namespace ApplicationTest\Factory;

use Application\Factory\IntlListenerFactory;
use Application\Listener\IntlListener;
use ApplicationTest\Util\ServiceManagerFactory;

class IntlListenerFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testFactoryReturnsInstance()
    {
        $factory = new IntlListenerFactory();
        $this->assertInstanceOf(
            IntlListener::class,
            $factory->createService(ServiceManagerFactory::getServiceManager())
        );
    }
}
