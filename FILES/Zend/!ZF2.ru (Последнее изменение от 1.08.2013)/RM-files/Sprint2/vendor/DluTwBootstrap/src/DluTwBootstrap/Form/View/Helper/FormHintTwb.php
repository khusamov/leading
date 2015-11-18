<?php
namespace DluTwBootstrap\Form\View\Helper;

use Zend\Form\View\Helper\AbstractHelper as AbstractFormViewHelper;
use \Zend\Form\ElementInterface;

/**
 * FormHintTwb
 * @package DluTwBootstrap
 * @copyright David Lukas (c) - http://www.zfdaily.com
 * @license http://www.zfdaily.com/code/license New BSD License
 * @link http://www.zfdaily.com
 * @link https://bitbucket.org/dlu/dlutwbootstrap
 */
class FormHintTwb extends AbstractFormViewHelper
{
    /**
     * Which element types support the inline help?
     * @var array
     */
    protected $supportedTypes   = array(
        'text',
        'password',
        'textarea',
        'select',
        'file',
    );

    /* **************************** METHODS ****************************** */

    /**
     * Render element hint from the provided $element
     * @param  ElementInterface $element
     * @return string
     */
    public function render(ElementInterface $element) {
        $type           = $element->getAttribute('type');
        if(!in_array($type, $this->supportedTypes)) {
            return '';
        }
        $escapeHelper   = $this->getEscapeHtmlHelper();
        $html           = '';
        //Hint
        if($element->getOption('hint')) {
            $html   = '<span class="help-inline">' . $escapeHelper($element->getOption('hint')) . '</span>';
        }
        return $html;
    }

    /**
     * Invoke helper as function
     * Proxies to {@link render()}.
     * @param  ElementInterface $element
     * @return string
     */
    public function __invoke(ElementInterface $element) {
        return $this->render($element);
    }
}