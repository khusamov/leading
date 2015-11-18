<?php
namespace DluTwBootstrap\Form\View\Helper;

use \Zend\Form\ElementInterface;
use Zend\Form\View\Helper\AbstractHelper as AbstractViewHelper;

/**
 * FormControlsTwb
 * @package DluTwBootstrap
 * @copyright David Lukas (c) - http://www.zfdaily.com
 * @license http://www.zfdaily.com/code/license New BSD License
 * @link http://www.zfdaily.com
 * @link https://bitbucket.org/dlu/dlutwbootstrap
 */
class FormControlsTwb extends AbstractViewHelper
{
    /* **************************** METHODS ****************************** */

    /**
     * Renders the controls div tag
     * @param  ElementInterface $element
     * @param string $content
     * @return string
     */
    public function render(ElementInterface $element, $content) {
        $html   = $this->openTag($element);
        $html   .= "\n" . $content;
        $html   .= "\n" . $this->closeTag();
        return $html;
    }

    /**
     * Returns the control group open tag
     * @param ElementInterface $element
     * @return string
     */
    public function openTag(ElementInterface $element) {
        $class  = 'controls';
        $html   = '<div class="' . $class . '">';
        return $html;
    }

    /**
     * Returns the control group closing tag
     * @return string
     */
    public function closeTag() {
        return '</div>';
    }

    /**
     * Invoke helper as function
     * Proxies to {@link render()}.
     * @param  ElementInterface $element
     * @param string $content
     * @return string
     */
    public function __invoke(ElementInterface $element = null, $content = null) {
        if(is_null($element)) {
            return $this;
        } else {
            return $this->render($element, $content);
        }
    }
}