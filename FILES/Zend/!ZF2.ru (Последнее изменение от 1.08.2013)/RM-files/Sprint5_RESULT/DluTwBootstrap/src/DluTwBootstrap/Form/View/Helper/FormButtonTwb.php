<?php
namespace DluTwBootstrap\Form\View\Helper;

use DluTwBootstrap\GenUtil;
use Zend\Form\ElementInterface;
use Zend\Form\View\Helper\FormButton;

/**
 * FormButtonTwb
 * @package DluTwBootstrap
 * @copyright David Lukas (c) - http://www.zfdaily.com
 * @license http://www.zfdaily.com/code/license New BSD License
 * @link http://www.zfdaily.com
 * @link https://bitbucket.org/dlu/dlutwbootstrap
 */
class FormButtonTwb extends FormButton
{
    /**
     * General utils
     * @var GenUtil
     */
    protected $genUtil;

    /* ******************** METHODS ******************** */

    /**
     * Constructor
     * @param \DluTwBootstrap\GenUtil $genUtil
     */
    public function __construct(GenUtil $genUtil) {
        $this->genUtil  = $genUtil;
    }

    /**
     * Prepares the element prior to rendering
     * @param \Zend\Form\ElementInterface $element
     * @param string $formType
     * @param array $displayOptions
     * @return void
     */
    protected function prepareElementBeforeRendering(ElementInterface $element, $formType, array $displayOptions) {
        $class  = $element->getAttribute('class');
        $class  = $this->genUtil->addWords('btn', $class);
        if (array_key_exists('class', $displayOptions)) {
            $class = $this->genUtil->addWords($displayOptions['class'], $class);
        }
        if($element->getOption('primary') && ($element->getOption('primary') == true)) {
            $class  = $this->genUtil->addWords('btn-primary', $class);
        }
        $escapeHtmlAttrHelper   = $this->getEscapeHtmlAttrHelper();
        $class                  = $this->genUtil->escapeWords($class, $escapeHtmlAttrHelper);
        $element->setAttribute('class', $class);
    }

    /**
     * Render a form <button> element from the provided $element,
     * using content from $buttonContent or the element's "label" attribute
     * @param  ElementInterface $element
     * @param  null|string $buttonContent
     * @param  null|string $formType
     * @param  array $displayOptions
     * @return string
     */
    public function render(ElementInterface $element,
                           $buttonContent = null,
                           $formType = null,
                           array $displayOptions = array()
    ) {
        $this->prepareElementBeforeRendering($element, $formType, $displayOptions);
        $html   = parent::render($element, $buttonContent);
        return $html;
    }

    /**
     * Invoke helper as function
     * Proxies to {@link render()}.
     * @param  ElementInterface|null $element
     * @param  null|string $buttonContent
     * @param  null|string $formType
     * @param  array $displayOptions
     * @return string|FormButtonTwb
     */
    public function __invoke(ElementInterface $element = null,
                             $buttonContent = null,
                             $formType = null,
                             array $displayOptions = array()
    ) {
        if (!$element) {
            return $this;
        }
        return $this->render($element, $buttonContent, $formType, $displayOptions);
    }
}