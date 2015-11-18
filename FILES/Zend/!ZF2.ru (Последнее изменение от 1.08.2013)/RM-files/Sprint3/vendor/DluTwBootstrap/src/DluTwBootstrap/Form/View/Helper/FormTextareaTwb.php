<?php
namespace DluTwBootstrap\Form\View\Helper;

use \DluTwBootstrap\GenUtil;
use \DluTwBootstrap\Form\FormUtil;

use Zend\Form\ElementInterface;
use Zend\Form\Exception;
use Zend\Form\View\Helper\FormTextarea;

/**
 * FormTextareaTwb
 * @package DluTwBootstrap
 * @copyright David Lukas (c) - http://www.zfdaily.com
 * @license http://www.zfdaily.com/code/license New BSD License
 * @link http://www.zfdaily.com
 * @link https://bitbucket.org/dlu/dlutwbootstrap
 */
class FormTextareaTwb extends FormTextarea
{
    /**
     * General utils
     * @var GenUtil
     */
    protected $genUtil;

    /**
     * Form utils
     * @var FormUtil
     */
    protected $formUtil;

    /* **************************** METHODS ****************************** */

    /**
     * Constructor
     * @param GenUtil $genUtil
     * @param FormUtil $formUtil
     */
    public function __construct(GenUtil $genUtil, FormUtil $formUtil) {
        $this->genUtil  = $genUtil;
        $this->formUtil = $formUtil;
    }

    /**
     * Prepares the element prior to rendering
     * @param \Zend\Form\ElementInterface $element
     * @param string $formType
     * @param array $displayOptions
     * @return void
     */
    protected function prepareElementBeforeRendering(ElementInterface $element, $formType, array $displayOptions) {
        if(array_key_exists('class', $displayOptions)) {
            $class                  = $element->getAttribute('class');
            $class                  = $this->genUtil->addWords($displayOptions['class'], $class);
            $escapeHtmlAttrHelper   = $this->getEscapeHtmlAttrHelper();
            $class                  = $this->genUtil->escapeWords($class, $escapeHtmlAttrHelper);
            $element->setAttribute('class', $class);
        }
        if(array_key_exists('rows', $displayOptions)) {
            $element->setAttribute('rows', (int)$displayOptions['rows']);
        }
        $this->formUtil->addIdAttributeIfMissing($element);
    }

    /**
     * Render a form <input> text element from the provided $element,
     * @param  ElementInterface $element
     * @param  null|string $formType
     * @param  array $displayOptions
     * @return string
     */
    public function render(ElementInterface $element, $formType = null, array $displayOptions = array()) {
        $this->prepareElementBeforeRendering($element, $formType, $displayOptions);
        $html   = parent::render($element);
        return $html;
    }

    /**
     * Invoke helper as function
     * Proxies to {@link render()}.
     * @param  ElementInterface|null $element
     * @param  null|string $formType
     * @param  array $displayOptions
     * @return string|FormTextareaTwb
     */
    public function __invoke(ElementInterface $element = null, $formType = null, array $displayOptions = array()
    ) {
        if (!$element) {
            return $this;
        }
        return $this->render($element, $formType, $displayOptions);
    }
}