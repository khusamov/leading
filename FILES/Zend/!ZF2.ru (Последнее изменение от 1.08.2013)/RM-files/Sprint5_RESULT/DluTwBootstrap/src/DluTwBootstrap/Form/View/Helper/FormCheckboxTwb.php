<?php
namespace DluTwBootstrap\Form\View\Helper;

use DluTwBootstrap\Form\FormUtil;

use Zend\Form\ElementInterface;
use Zend\Form\View\Helper\FormCheckbox;

/**
 * FormCheckboxTwb
 * @package DluTwBootstrap
 * @copyright David Lukas (c) - http://www.zfdaily.com
 * @license http://www.zfdaily.com/code/license New BSD License
 * @link http://www.zfdaily.com
 * @link https://bitbucket.org/dlu/dlutwbootstrap
 */
class FormCheckboxTwb extends FormCheckbox
{
    /**
     * @var FormUtil
     */
    protected $formUtil;

    /* ******************** METHODS ******************** */

    /**
     * Constructor
     * @param FormUtil $formUtil
     */
    public function __construct(FormUtil $formUtil) {
        $this->formUtil  = $formUtil;
    }

    /**
     * Prepares the element prior to rendering
     * @param \Zend\Form\ElementInterface $element
     * @param string $formType
     * @param array $displayOptions
     * @return void
     */
    protected function prepareElementBeforeRendering(ElementInterface $element, $formType, array $displayOptions) {
        $this->formUtil->addIdAttributeIfMissing($element);
    }

    /**
     * Render a form <input> checkbox element from the provided $element,
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
        //Wrap the simple checkbox into label for proper rendering
        $html   = '<label class="checkbox">' . $html . '</label>';
        return $html;
    }

    /**
     * Invoke helper as function
     * Proxies to {@link render()}.
     * @param  ElementInterface|null $element
     * @param  null|string $formType
     * @param  array $displayOptions
     * @return string|FormCheckboxTwb
     */
    public function __invoke(ElementInterface $element = null, $formType = null, array $displayOptions = array()
    ) {
        if (!$element) {
            return $this;
        }
        return $this->render($element, $formType, $displayOptions);
    }
}