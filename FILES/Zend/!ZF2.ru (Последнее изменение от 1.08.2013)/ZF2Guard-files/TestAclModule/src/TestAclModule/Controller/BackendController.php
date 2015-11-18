<?php

namespace TestAclModule\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class BackendController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
}
