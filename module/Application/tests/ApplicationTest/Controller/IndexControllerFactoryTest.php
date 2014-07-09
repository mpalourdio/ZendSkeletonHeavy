<?php

namespace ApplicationTest\Factory;

use Application\Controller\IndexController;
use Application\Controller\IndexControllerFactory;
use ApplicationTest\Util\ServiceManagerFactory;

class IndexControllerFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testControllerFactoryReturnsControllerInstance()
    {
        $factory           = new IndexControllerFactory();
        $controllerManager = ServiceManagerFactory::getServiceManager()->get('ControllerManager');

        $this->assertInstanceOf(IndexController::class, $factory->createService($controllerManager));
    }
}
