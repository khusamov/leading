<?php
namespace DluTwBootstrap\View\Helper\Navigation;

/**
 * Abstract Navigation Helper
 * @package DluTwBootstrap
 * @copyright David Lukas (c) - http://www.zfdaily.com
 * @license http://www.zfdaily.com/code/license New BSD License
 * @link http://www.zfdaily.com
 * @link https://bitbucket.org/dlu/dlutwbootstrap
 */
abstract class AbstractNavHelper extends AbstractHelper
{

    /* *********************** METHODS *************************** */

    protected function decorateContainer($content,
                                         \Zend\Navigation\Navigation $container,
                                         $renderIcons = true,
                                         $activeIconInverse = true,
                                         array $options = array()) {
        //Align option
        if(array_key_exists('align', $options)) {
            $align  = $options['align'];
        } else {
            $align  = null;
        }
        //ulClass option
        if(array_key_exists('ulClass', $options)) {
            $ulClass    = $options['ulClass'];
        } else {
            $ulClass    = '';
        }
        if($align == self::ALIGN_LEFT) {
            $this->addWord('pull-left', $ulClass);
        } elseif($align == self::ALIGN_RIGHT) {
            $this->addWord('pull-right', $ulClass);
        }
        $html   = '<ul class="' . $ulClass . '">';
        $html   .= "\n" . $content;
        $html   .= "\n</ul>";
        return $html;
    }

    protected function decorateNavHeader($content,
                                         \Zend\Navigation\Page\AbstractPage $item,
                                         $renderIcons = true,
                                         $activeIconInverse = true,
                                         array $options = array()) {
        return $this->decorateNavHeaderInDropdown($content, $item, $renderIcons, $activeIconInverse, $options);
    }

    protected function decorateDivider($content,
                                       \Zend\Navigation\Page\AbstractPage $item,
                                       array $options = array()) {
        return $this->decorateDividerInDropdown($content, $item, $options);
    }

    protected function decorateLink($content,
                                    \Zend\Navigation\Page\AbstractPage $page,
                                    $renderIcons = true,
                                    $activeIconInverse = true,
                                    array $options = array()) {
        return $this->decorateLinkInDropdown($content, $page, $renderIcons, $activeIconInverse, $options);
    }

    protected function decorateDropdown($content,
                                        \Zend\Navigation\Page\AbstractPage $page,
                                        $renderIcons = true,
                                        $activeIconInverse = true,
                                        array $options = array()) {
        //Get attribs
        $liAttribs = array(
            'id'            => $page->getId(),
            'class'         => 'dropdown' . ($page->isActive(true) ? ' active' : ''),
        );
        $html   = "\n" . '<li' . $this->htmlAttribs($liAttribs) . '>'
                . "\n" . $content
                . "\n</li>";
        return $html;
    }
}