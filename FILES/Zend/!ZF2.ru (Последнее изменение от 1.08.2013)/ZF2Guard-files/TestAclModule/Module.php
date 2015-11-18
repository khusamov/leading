<?php
namespace TestAclModule;

use Zend\Permissions\Acl\Acl;
use Zend\Session\Container;
use Zend\Debug\Debug;

class Module
{
    protected $acl;
    
    public function onBootstrap($e)
    {
        $this->initAcl($e);
        
        $e->getApplication()
          ->getEventManager()
          ->attach(
              'route', array($this,'checkAccess')                
          );
    }
    
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    public function getControllerConfig()
    {
        return include __DIR__ . '/config/controllers.config.php';
    }
    
    public function initAcl($e)
    {
        $this->acl = new Acl();
        $config = $e->getApplication()
                    ->getServiceManager()
                    ->get('Config');
        $params = $config['testaclmodule'];
        if(array_key_exists('allow', $params)) {
            $allow = $params['allow'];
            foreach($allow as $rule) {
                $roles      = $rule[0];
                $resources  = isset($rule[1]) ? $rule[1] : null;
                $privileges = isset($rule[2]) ? $rule[2] : null;
                foreach($roles as $role) {
                    if(!$this->acl->hasRole($role)) {
                        $this->acl->addRole($role);
                    }
                    if(is_array($resources)) {
                        foreach($resources as $resource) {
                            if(!$this->acl->hasResource($resource)) {
                                $this->acl->addResource($resource);
                            }
                        }
                    } elseif(is_string($resources)) {
                        if(!$this->acl->hasResource($resources)) {
                            $this->acl->addResource($resources);
                        }
                    }
                    $this->acl->allow($role, $resources, $privileges);
                }
            }
        }
    }
    
    public function checkAccess($e)
    {
        $route = $e->getRouteMatch();
        $session = new Container('user');
        $role = isset($session->role) ? $session->role : 'guest';
        if(!$this->acl->hasResource($route->getParam('controller'))) {
            $access = false;
        } else {
            $access = $this->acl->isAllowed(
                $role,
                $route->getParam('controller'),
                $route->getParam('action')                
            );
        }
        Debug::dump($access,'Assess:');
        // if(!$access) { exit('Restricted Access!'); }
    }
}
