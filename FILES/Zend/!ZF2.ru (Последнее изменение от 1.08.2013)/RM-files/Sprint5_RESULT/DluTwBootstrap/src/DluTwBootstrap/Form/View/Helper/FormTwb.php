<?php
namespace DluTwBootstrap\Form\View\Helper;

use DluTwBootstrap\Form\Exception\UnsupportedFormTypeException;
use DluTwBootstrap\Form\Exception\UndefinedFormElementException;
use DluTwBootstrap\GenUtil;
use DluTwBootstrap\Form\FormUtil;

use Zend\Form\View\Helper\Form as ViewHelperForm;
use Zend\Form\Form;
use Zend\Form\FieldsetInterface;
use Zend\Form\ElementInterface;
use Zend\Form\FormInterface;

/**
 * FormTwb
 * @package DluTwBootstrap
 * @copyright David Lukas (c) - http://www.zfdaily.com
 * @license http://www.zfdaily.com/code/license New BSD License
 * @link http://www.zfdaily.com
 * @link https://bitbucket.org/dlu/dlutwbootstrap
 */
class FormTwb extends ViewHelperForm
{
    /**
     * Mapping of form types to form css classes
     * @var array
     */
    protected $formTypeMap      = array(
        FormUtil::FORM_TYPE_HORIZONTAL => 'form-horizontal',
        FormUtil::FORM_TYPE_VERTICAL   => 'form-vertical',
        FormUtil::FORM_TYPE_INLINE     => 'form-inline',
        FormUtil::FORM_TYPE_SEARCH     => 'form-search',
    );

    /**
     * General utils
     * @var GenUtil
     */
    protected $genUtil;

    /**
     * @var FormUtil
     */
    protected $formUtil;

    /* **************************** METHODS ****************************** */

    /**
     * Constructor
     * @param \DluTwBootstrap\GenUtil $genUtil
     * @param \DluTwBootstrap\Form\FormUtil $formUtil
     */
    public function __construct(GenUtil $genUtil, FormUtil $formUtil) {
        $this->genUtil  = $genUtil;
        $this->formUtil = $formUtil;
    }

    /**
     * @param null|Form $form
     * @param null|string $formType
     * @param array $displayOptions
     * @param bool $renderErrors
     * @return FormTwb|string
     */
    public function __invoke(Form $form = null, $formType = null, array $displayOptions = array(), $renderErrors = true)
    {
        if(is_null($form)) {
            return $this;
        }
        return $this->render($form, $formType, $displayOptions, $renderErrors);
    }

    /**
     * Renders a quick form
     * @param Form $form
     * @param string|null $formType
     * @param array $displayOptions
     * @param bool $renderErrors
     * @return string
     */
    public function render(Form $form, $formType = null, array $displayOptions = array(), $renderErrors = true)
    {
        $renderer = $this->getView();
        if (!method_exists($renderer, 'plugin')) {
            // Bail early if renderer is not pluggable
            return '';
        }
        $formType   = $this->formUtil->filterFormType($formType);
        //Open Tag
        $html   = $this->openTag($form, $formType, $displayOptions);
        //Form content
        $fieldsetHelper = $renderer->plugin('form_fieldset_twb');
        $html   .= $fieldsetHelper($form, $formType, $displayOptions, false, false, $renderErrors);
        //Form actions
        $actionsHelper  = $renderer->plugin('form_actions_twb');
        $actions        = $this->getActions($form);
        if (array_key_exists('elements', $displayOptions)) {
            $displayOptionsActions  = $displayOptions['elements'];
        } else {
            $displayOptionsActions  = array();
        }
        $html   .= $actionsHelper($actions, $formType, $displayOptionsActions);
        //Close Tag
        $html   .= $this->closeTag();
        return $html;
    }

    /**
     * Finds action buttons in a form and retruns them
     * @param \Zend\Form\Form $form
     * @return array
     */
    protected function getActions(Form $form)
    {
        //Iterate over all form elements (outside any fieldsets) and find buttons
        $iterator   = $form->getIterator();
        $actions    = array();
        foreach($iterator as $element) {
            /* @var $element ElementInterface */
            if($element instanceof \Zend\Form\FieldsetInterface) {
                //Do not inspect fieldsets
                continue;
            }
            if(in_array($element->getAttribute('type'), array('submit', 'reset', 'button',))) {
                //It is one of the 'button' elements
                $actions[]  = $element;
            }
        }
        return $actions;
    }

    /**
     * Generate an opening form tag
     * @param  null|FormInterface $form
     * @param null|string $formType
     * @param array $displayOptions
     * @throws \DluTwBootstrap\Form\Exception\UnsupportedFormTypeException
     * @return string
     */
    public function openTag(FormInterface $form = null, $formType = null, $displayOptions = array())
    {
        $formType   = $this->formUtil->filterFormType($formType);
        if (!array_key_exists($formType, $this->formTypeMap)) {
            throw new UnsupportedFormTypeException("Unsupported form type '$formType'.");
        }
        if ($form) {
            $class  = $this->genUtil->addWords($this->formTypeMap[$formType], $form->getAttribute('class'));
            if (array_key_exists('class', $displayOptions)) {
                $class  = $this->genUtil->addWords($displayOptions['class'], $class);
            }
            $escapeHtmlAttrHelper   = $this->getEscapeHtmlAttrHelper();
            $class                  = $this->genUtil->escapeWords($class, $escapeHtmlAttrHelper);
            $form->setAttribute('class', $class);
        }
        return parent::openTag($form);
    }
}