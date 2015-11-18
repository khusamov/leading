<?php

namespace TestAclModule\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Debug\Debug;

class FrontendController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
}
