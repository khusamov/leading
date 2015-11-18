<?php
namespace DluTwBootstrap\Form\View\Helper;

use DluTwBootstrap\Form\FormUtil;

use Zend\Form\ElementInterface;
use Zend\Form\View\Helper\AbstractHelper as AbstractViewHelper;

/**
 * FormActionsTwb
 * @package DluTwBootstrap
 * @copyright David Lukas (c) - http://www.zfdaily.com
 * @license http://www.zfdaily.com/code/license New BSD License
 * @link http://www.zfdaily.com
 * @link https://bitbucket.org/dlu/dlutwbootstrap
 */
class FormActionsTwb extends AbstractViewHelper
{
    /**
     * @var FormUtil
     */
    protected $formUtil;

    /* **************************** METHODS ****************************** */

    /**
     * Constructor
     * @param \DluTwBootstrap\Form\FormUtil $formUtil
     */
    public function __construct(FormUtil $formUtil)
    {
        $this->formUtil = $formUtil;
    }

    /**
     * Renders the form-actions div tag
     * @param string|array $content Either a string or an array of elements
     * @param null|string $formType
     * @param array $displayOptions
     * @return string
     */
    public function render($content, $formType = null, array $displayOptions = array())
    {
        if (is_array($content)) {
            $renderer = $this->getView();
            if (!method_exists($renderer, 'plugin')) {
                // Bail early if renderer is not pluggable
                return '';
            }
            $elementViewHelper  = $renderer->plugin('form_element_twb');
            /* @var $elementViewHelper FormElementTwb */
            $renderedElements   = array();
            foreach ($content as $element) {
                if (!($element instanceof ElementInterface)) {
                    //Only objects of type ElementInterface are accepted as content
                    continue;
                }
                if (array_key_exists($element->getName(), $displayOptions)) {
                    $elemDisplayConfig  = $displayOptions[$element->getName()];
                } else {
                    $elemDisplayConfig  = array();
                }
                $renderedElements[] = $elementViewHelper->render($element, $formType, $elemDisplayConfig);
            }
            $content    = implode("\n", $renderedElements);
        }
        if (!is_string($content)) {
            //Unsupported content type
            return '';
        }
        $html   = $this->openTag($formType, $displayOptions);
        $html   .= "\n" . $content;
        $html   .= "\n" . $this->closeTag($formType);
        return $html;
    }

    /**
     * Returns the form-renderActions open tag
     * @param null|string $formType
     * @param array $displayOptions
     * @return string
     */
    public function openTag($formType = null, array $displayOptions = array())
    {
        if (in_array($formType, array(FormUtil::FORM_TYPE_HORIZONTAL, FormUtil::FORM_TYPE_VERTICAL))) {
            $html   = '<div class="form-actions">';
        } else {
            $html   = '';
        }
        return $html;
    }

    /**
     * Returns the control group closing tag
     * @param null|string $formType
     * @return string
     */
    public function closeTag($formType = null)
    {
        if (in_array($formType, array(FormUtil::FORM_TYPE_HORIZONTAL, FormUtil::FORM_TYPE_VERTICAL))) {
            $html   = '</div>';
        } else {
            $html   = '';
        }
        return $html;
    }

    /**
     * Invoke helper as function
     * Proxies to {@link render()}.
     * @param string|array|null $content Either a string or an array of elements
     * @param null|string $formType
     * @param array $displayOptions
     * @return string|FormActionsTwb
     */
    public function __invoke($content = null, $formType = null, array $displayOptions = array())
    {
        if (is_null($content)) {
            return $this;
        }
        return $this->render($content, $formType, $displayOptions);
    }
}