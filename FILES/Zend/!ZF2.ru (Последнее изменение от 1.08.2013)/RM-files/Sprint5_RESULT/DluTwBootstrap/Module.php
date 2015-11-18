<?php
namespace DluTwBootstrap;

use Zend\ServiceManager\ServiceManager;

/**
 * Module
 * @package DluTwBootstrap
 * @copyright David Lukas (c) - http://www.zfdaily.com
 * @license http://www.zfdaily.com/code/license New BSD License
 * @link http://www.zfdaily.com
 * @link https://bitbucket.org/dlu/dlutwbootstrap
 */
class Module
{
    /* ********************** METHODS ************************** */

    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    /**
     * OnBootstrap listener
     * @param $e
     */
    public function onBootstrap(\Zend\Mvc\MvcEvent $e) {
        $application                = $e->getApplication();
        $sm                         = $application->getServiceManager();
        $viewHelperPluginManager    = $sm->get('view_helper_manager');
        /* @var $viewHelperPluginManager \Zend\View\HelperPluginManager */

        //Register DluTwBootstrap view helpers
        $viewHelperConfigurator     = $sm->get('dlu_twb_view_helper_configurator');
        /* @var $viewHelperConfigurator \DluTwBootstrap\Form\View\HelperConfig */
        $viewHelperConfigurator->configureServiceManager($viewHelperPluginManager);

        //Register DluTwBootstrap view navigation helpers
        $navViewHelperConfigurator  = $sm->get('dlu_twb_nav_view_helper_configurator');
        /* @var $navViewHelperConfigurator \DluTwBootstrap\View\Helper\Navigation\PluginConfigurator */
        $navHelperPluginManager     = $viewHelperPluginManager->get('navigation')->getPluginManager();
        $navViewHelperConfigurator->configureServiceManager($navHelperPluginManager);

        //Prepare the \Zend\Navigation\Page\Mvc for use
        //The pages in navigation container created with a factory have the router injected,
        //but any other explicitly created page needs the router too, so it makes sense to set the default router
        $router                     = $sm->get('router');
        \Zend\Navigation\Page\Mvc::setDefaultRouter($router);
    }

    public function getServiceConfig() {
        return array(
            'factories' => array(
                'dlu_twb_view_helper_configurator'  => function(ServiceManager $sm) {
                    $genUtil    = $sm->get('dlu_twb_gen_util');
                    $formUtil   = $sm->get('dlu_twb_form_util');
                    $instance   = new \DluTwBootstrap\Form\View\HelperConfig($genUtil, $formUtil);
                    return $instance;
                },
            ),
        );
    }
}
