<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    /**
     *
     */
    public function __construct()
    {

    }

    /**
     * @return ViewModel
     */
    public function indexAction()
    {
        return new ViewModel();
    }
}
