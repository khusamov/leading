<?php
namespace DluTwBootstrap\View\Helper\Navigation;

use Zend\ServiceManager\ConfigInterface;
use Zend\ServiceManager\ServiceManager;

/**
 * PluginConfigurator
 * @package DluTwBootstrap
 * @copyright David Lukas (c) - http://www.zfdaily.com
 * @license http://www.zfdaily.com/code/license New BSD License
 * @link http://www.zfdaily.com
 * @link https://bitbucket.org/dlu/dlutwbootstrap
 */
class PluginConfigurator implements ConfigInterface
{
    /**
     * @var array Nav View helpers
     */
    protected $helpers = array(
        'twbNavbar'     => 'DluTwBootstrap\View\Helper\Navigation\TwbNavbar',
        'twbNavList'    => 'DluTwBootstrap\View\Helper\Navigation\TwbNavList',
        'twbTabs'       => 'DluTwBootstrap\View\Helper\Navigation\TwbTabs',
        'twbButtons'    => 'DluTwBootstrap\View\Helper\Navigation\TwbButtons',
    );

    /* **************************** METHODS ************************** */

    public function configureServiceManager(ServiceManager $serviceManager)
    {
        foreach($this->helpers as $name => $fqcn) {
            $serviceManager->setInvokableClass($name, $fqcn);
        }
    }
}
