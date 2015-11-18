<?php
namespace DluTwBootstrap\Form\View\Helper;

use DluTwBootstrap\GenUtil;

use Zend\Form\ElementInterface;
use Zend\Form\View\Helper\FormReset;

/**
 * FormResetTwb
 * @package DluTwBootstrap
 * @copyright David Lukas (c) - http://www.zfdaily.com
 * @license http://www.zfdaily.com/code/license New BSD License
 * @link http://www.zfdaily.com
 * @link https://bitbucket.org/dlu/dlutwbootstrap
 */
class FormResetTwb extends FormReset
{
    /**
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
     * Render a form <input> reset element from the provided $element,
     * @param  ElementInterface $element
     * @param  null|string $formType
     * @param  array $displayOptions
     * @return string
     */
    public function render(ElementInterface $element,
                           $formType = null,
                           array $displayOptions = array()
    ) {
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
     * @return string|FormResetTwb
     */
    public function __invoke(ElementInterface $element = null, $formType = null, array $displayOptions = array()
    ) {
        if (!$element) {
            return $this;
        }
        return $this->render($element, $formType, $displayOptions);
    }
}