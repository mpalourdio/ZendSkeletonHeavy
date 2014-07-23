<?php
namespace ApplicationTest\Controller;

use Application\Controller\IndexController;
use ApplicationTest\Util\ServiceManagerFactory;
use Zend\Http\Request;
use Zend\Http\Response;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Router\Http\TreeRouteStack as HttpRouter;
use Zend\Mvc\Router\RouteMatch;

class IndexControllerTest extends \PHPUnit_Framework_TestCase
{
    protected $controller;
    protected $request;
    protected $response;
    protected $routeMatch;
    protected $event;
    protected $serviceManager;

    protected function setUp()
    {
        $this->serviceManager = ServiceManagerFactory::getServiceManager();
        $this->controller     = new IndexController();
        $this->request        = new Request();
        $this->routeMatch     = new RouteMatch(['controller' => IndexController::class]);
        $this->event          = new MvcEvent();
        $config               = $this->serviceManager->get('Config');
        $routerConfig         = isset($config['router']) ? $config['router'] : [];
        $router               = HttpRouter::factory($routerConfig);

        $this->event->setRouter($router);
        $this->event->setRouteMatch($this->routeMatch);
        $this->controller->setEvent($this->event);
        $this->controller->setServiceLocator($this->serviceManager);
    }

    public function testIndexActionCanBeAccessed()
    {
        $this->routeMatch->setParam('action', 'index');
        $this->controller->dispatch($this->request);
        $response = $this->controller->getResponse();

        $this->assertEquals(200, $response->getStatusCode());
    }
}
