<?php
namespace DluTwBootstrap\View\Helper\Navigation;

/**
 * TwbNavList
 * @package DluTwBootstrap
 * @copyright David Lukas (c) - http://www.zfdaily.com
 * @license http://www.zfdaily.com/code/license New BSD License
 * @link http://www.zfdaily.com
 * @link https://bitbucket.org/dlu/dlutwbootstrap
 */
class TwbNavList extends AbstractNavHelper
{

    /* *********************** METHODS *************************** */

    /**
     * Renders helper
     * @param  string|\Zend\Navigation\AbstractContainer $container [optional] container to render.
     *                                         Default is null, which indicates
     *                                         that the helper should render
     *                                         the container returned by {@link
     *                                         getContainer()}.
     * @return string helper output
     * @throws \Zend\View\Exception\ExceptionInterface if unable to render
     */
    public function render($container = null) {
        return $this->renderNavList($container);
    }

    /**
     * Renders NavList
     * @param null|\Zend\Navigation\Navigation $container
     * @param bool $well
     * @param bool $renderIcons
     * @return string
     */
    public function renderNavList(\Zend\Navigation\Navigation $container = null, $well = true, $renderIcons = true) {
        if (null === $container) {
            $container = $this->getContainer();
        }
        $html   = '';
        //Well
        if($well) {
            $html   .= "\n" . '<div class="well" style="padding: 8px 0;">';
        }
        //Container
        $options    = array(
            'ulClass'   => 'nav nav-list',
        );
        $html   .= "\n" . $this->renderContainer($container, $renderIcons, true, $options);
        //Well (close div)
        if($well) {
            $html   .= "\n" . '</div>';
        }
        return $html;
    }
}