<?php
namespace DluTwBootstrap\Form\View\Helper;

use Zend\Form\Element;
use Zend\Form\ElementInterface;
use Zend\Form\View\Helper\FormElement as ViewHelperFormElement;

/**
 * FormElementTwb
 * @package DluTwBootstrap
 * @copyright David Lukas (c) - http://www.zfdaily.com
 * @license http://www.zfdaily.com/code/license New BSD License
 * @link http://www.zfdaily.com
 * @link https://bitbucket.org/dlu/dlutwbootstrap
 */
class FormElementTwb extends ViewHelperFormElement
{
    /**
     * Render an element
     * @param  ElementInterface $element
     * @param  null|string $formType
     * @param  array $displayOptions
     * @return string
     */
    public function render(ElementInterface $element, $formType = null, array $displayOptions = array())
    {
        $renderer = $this->getView();
        if (!method_exists($renderer, 'plugin')) {
            // Bail early if renderer is not pluggable
            return '';
        }

        //TODO - captcha
        if ($element instanceof Element\Captcha) {
            $helper = $renderer->plugin('form_captcha');
            return $helper($element);
        }

        //CSRF
        if ($element instanceof Element\Csrf) {
            $helper = $renderer->plugin('form_hidden_twb');
            return $helper($element, $formType, $displayOptions);
        }

        //TODO - collection
        if ($element instanceof Element\Collection) {
            $helper = $renderer->plugin('form_collection');
            return $helper($element);
        }

        $type           = $element->getAttribute('type');
        $valueOptions   = $element->getOption('value_options');
        $objectManager   = $element->getOption('object_manager');

        //Multi Checkbox
        if ('multi_checkbox' == $type && (is_array($valueOptions) || is_object($objectManager))) {
            $helper = $renderer->plugin('form_multi_checkbox_twb');
            return $helper($element, $formType, $displayOptions);
        }

        //Select
        if ('select' == $type && (is_array($valueOptions) || is_object($objectManager))) {
            $helper = $renderer->plugin('form_select_twb');
            return $helper($element, $formType, $displayOptions);
        }

        //Textarea
        if ('textarea' == $type) {
            $helper = $renderer->plugin('form_textarea_twb');
            return $helper($element, $formType, $displayOptions);
        }

        //Input
        $helper = $renderer->plugin('form_input_twb');
        return $helper($element, $formType, $displayOptions);
    }

    /**
     * Invoke helper as function
     * Proxies to {@link render()}.
     * @param  ElementInterface|null $element
     * @param  null|string $formType
     * @param  array $displayOptions
     * @return string|FormElementTwb
     */
    public function __invoke(ElementInterface $element = null, $formType = null, array $displayOptions = array())
    {
        if (!$element) {
            return $this;
        }
        return $this->render($element, $formType, $displayOptions);
    }
}