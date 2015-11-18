<?php
namespace DluTwBootstrap\Form\View\Helper;

use DluTwBootstrap\Form\FormUtil;

use Zend\View\Helper\AbstractHelper as BaseAbstractHelper;
use Zend\Form\ElementInterface;
use Zend\Form\View\Helper\FormElement as ViewHelperFormElement;

/**
 * FormInputTwb
 * @package DluTwBootstrap
 * @copyright David Lukas (c) - http://www.zfdaily.com
 * @license http://www.zfdaily.com/code/license New BSD License
 * @link http://www.zfdaily.com
 * @link https://bitbucket.org/dlu/dlutwbootstrap
 */
class FormInputTwb extends BaseAbstractHelper
{
    /**
     * @var FormUtil
     */
    protected $formUtil;

    /**
     * Valid values for the input type
     * @var array
     */
    protected $validTypes = array(
        'button'         => true,
        'checkbox'       => true,
        'file'           => true,
        'hidden'         => true,
        //'image'          => true,
        'password'       => true,
        'radio'          => true,
        'reset'          => true,
        'submit'         => true,
        'text'           => true,
        /*
        'color'          => true,
        'date'           => true,
        'datetime'       => true,
        'datetime-local' => true,
        'email'          => true,
        'month'          => true,
        'number'         => true,
        'range'          => true,
        'search'         => true,
        'tel'            => true,
        'time'           => true,
        'url'            => true,
        'week'           => true,
        */
    );

    /**
     * Constructor
     * @param \DluTwBootstrap\Form\FormUtil $formUtil
     */
    public function __construct(FormUtil $formUtil)
    {
        $this->formUtil = $formUtil;
    }

    /**
     * Render an input element
     * If the passed element has no type set assumes 'text'
     * If the element type is not supported, returns an empty string
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
        $formType   = $this->formUtil->filterFormType($formType);
        $type       = $element->getAttribute('type');
        if (empty($type)) {
            $type   = 'text';
        }
        $type = strtolower($type);
        if (!isset($this->validTypes[$type])) {
            $type   = 'text';
        }

        //Button
        if ('button' == $type) {
            $helper = $renderer->plugin('form_button_twb');
            return $helper($element, null, $formType, $displayOptions);
        }
        //Checkbox
        if ('checkbox' == $type) {
            $helper = $renderer->plugin('form_checkbox_twb');
            return $helper($element, $formType, $displayOptions);
        }
        //File
        if ('file' == $type) {
            $helper = $renderer->plugin('form_file_twb');
            return $helper($element, $formType, $displayOptions);
        }
        //Hidden
        if ('hidden' == $type) {
            $helper = $renderer->plugin('form_hidden_twb');
            return $helper($element, $formType, $displayOptions);
        }

        //TODO - image input

        //Password
        if ('password' == $type) {
            $helper = $renderer->plugin('form_password_twb');
            return $helper($element, $formType, $displayOptions);
        }
        //Radio
        if ('radio' == $type) {
            $helper = $renderer->plugin('form_radio_twb');
            return $helper($element, $formType, $displayOptions);
        }
        //Reset
        if ('reset' == $type) {
            $helper = $renderer->plugin('form_reset_twb');
            return $helper($element, $formType, $displayOptions);
        }
        //Submit
        if ('submit' == $type) {
            $helper = $renderer->plugin('form_submit_twb');
            return $helper($element, $formType, $displayOptions);
        }
        //Text
        if ('text' == $type) {
            $helper = $renderer->plugin('form_text_twb');
            return $helper($element, $formType, $displayOptions);
        }
        return '';
    }

    /**
     * Invoke helper as function
     * Proxies to {@link render()}.
     * @param  ElementInterface|null $element
     * @param  null|string $formType
     * @param  array $displayOptions
     * @return string|FormInputTwb
     */
    public function __invoke(ElementInterface $element = null, $formType = null, array $displayOptions = array())
    {
        if (!$element) {
            return $this;
        }
        return $this->render($element, $formType, $displayOptions);
    }
}