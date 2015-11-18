<?php

namespace TestAclModule\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Session\Container;

class AuthenticationController extends AbstractActionController
{
    public function loginAction()
    {
        $session = new Container('user');
        $session->role = 'admin';
        $this->redirect()->toRoute('admin');
    }
    
    public function logoutAction()
    {
        $session = new Container('user');
        if(isset($session->role)) {
            unset($session->role);
        }
        $this->redirect()->toRoute('home');
    }
}
