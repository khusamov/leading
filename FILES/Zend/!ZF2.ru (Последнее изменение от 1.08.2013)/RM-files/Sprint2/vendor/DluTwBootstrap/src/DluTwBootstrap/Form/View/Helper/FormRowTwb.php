<?php
namespace DluTwBootstrap\Form\View\Helper;

use DluTwBootstrap\Form\View\Helper\FormElementTwb;
use DluTwBootstrap\Form\View\Helper\FormHintTwb;
use DluTwBootstrap\Form\View\Helper\FormDescriptionTwb;
use DluTwBootstrap\Form\View\Helper\FormElementErrorsTwb;
use DluTwBootstrap\Form\View\Helper\FormControlGroupTwb;
use DluTwBootstrap\Form\View\Helper\FormControlsTwb;
use DluTwBootstrap\Form\Exception\UnsupportedHelperTypeException;
use DluTwBootstrap\GenUtil;
use DluTwBootstrap\Form\FormUtil;

use Zend\Form\View\Helper\FormLabel;
use Zend\Form\ElementInterface;
use Zend\Form\Exception;
use Zend\Form\View\Helper\AbstractHelper;

/**
 * FormRowTwb
 * @package DluTwBootstrap
 * @copyright David Lukas (c) - http://www.zfdaily.com
 * @license http://www.zfdaily.com/code/license New BSD License
 * @link http://www.zfdaily.com
 * @link https://bitbucket.org/dlu/dlutwbootstrap
 */
class FormRowTwb extends AbstractHelper
{
    /**
     * @var FormLabel
     */
    protected $labelHelper;

    /**
     * @var FormElementTwb
     */
    protected $elementHelper;

    /**
     * @var FormElementErrorsTwb
     */
    protected $elementErrorsHelper;

    /**
     * @var FormHintTwb
     */
    protected $hintHelper;

    /**
     * @var FormDescriptionTwb
     */
    protected $descriptionHelper;

    /**
     * @var FormControlGroupTwb
     */
    protected $controlGroupHelper;

    /**
     * @var FormControlsTwb
     */
    protected $controlsHelper;

    /**
     * @var GenUtil
     */
    protected $genUtil;

    /**
     * @var FormUtil
     */
    protected $formUtil;

    /* ******************** METHODS ******************** */

    /**
     * Constructor
     * @param GenUtil $genUtil
     * @param FormUtil $formUtil
     */
    public function __construct(GenUtil $genUtil, FormUtil $formUtil)
    {
        $this->genUtil  = $genUtil;
        $this->formUtil = $formUtil;
    }

    /**
     * Utility form helper that renders a label (if it exists), an element, hint, description and errors
     * @param ElementInterface $element
     * @param string|null $formType
     * @param array $displayOptions
     * @param bool $renderErrors
     * @return string
     */
    public function render(ElementInterface $element,
                           $formType = null,
                           array $displayOptions = array(),
                           $renderErrors = true)
    {
        $formType            = $this->formUtil->filterFormType($formType);

        $elementHelper       = $this->getElementHelper();
        $elementErrorsHelper = $this->getElementErrorsHelper();
        $hintHelper          = $this->getHintHelper();
        $descriptionHelper   = $this->getDescriptionHelper();

        $label               = (string)$element->getLabel();
        $elementString       = $elementHelper->render($element, $formType, $displayOptions);

        //Hint, description and element errors are generated only for visible elements on horizontal and vertical forms
        //Divs for control-group and controls are generated only for visible elements on horizontal and vertical forms,
        //otherwise a blank vertical space is rendered
        if (($formType == FormUtil::FORM_TYPE_HORIZONTAL || $formType == FormUtil::FORM_TYPE_VERTICAL)
            && !($element instanceof \Zend\Form\Element\Hidden)
            && !($element instanceof \Zend\Form\Element\Csrf)) {
            $controlGroupHelper     = $this->getControlGroupHelper();
            $controlGroupOpen       = $controlGroupHelper->openTag($element);
            $controlGroupClose      = $controlGroupHelper->closeTag();
            $controlsHelper         = $this->getControlsHelper();
            $controlsOpen           = $controlsHelper->openTag($element);
            $controlsClose          = $controlsHelper->closeTag();
            $hint                   = $hintHelper->render($element);
            $description            = $descriptionHelper->render($element);
            if ($renderErrors) {
                $elementErrors          = $elementErrorsHelper->render($element);
            } else {
                $elementErrors          = '';
            }
        } else {
            $controlGroupOpen       = '';
            $controlGroupClose      = '';
            //We need some whitespace between label and element on inline and search forms
            $controlsOpen           = "\n";
            $controlsClose          = '';
            $hint                   = '';
            $description            = '';
            $elementErrors          = '';
        }

        if (!empty($label)) {
            //Element has a label
            $labelHelper        = $this->getLabelHelper();
            $label              = $labelHelper($element, $displayOptions);
        }
        $markup = $controlGroupOpen
            . $label
            . $controlsOpen
            . $elementString
            . $hint
            . $description
            . $elementErrors
            . $controlsClose
            . $controlGroupClose;
        return $markup;
    }

    /**
     * Invoke helper as a function
     * Proxies to {@link render()}.
     * @param null|ElementInterface $element
     * @param string|null $formType
     * @param array $displayOptions
     * @param bool $renderErrors
     * @return string|FormRowTwb
     */
    public function __invoke(ElementInterface $element = null,
                             $formType = null,
                             array $displayOptions = array(),
                             $renderErrors = true) {
        if (!$element) {
            return $this;
        }
        return $this->render($element, $formType, $displayOptions, $renderErrors);
    }

    /**
     * Retrieve the FormLabelTwb helper
     * @return FormLabelTwb
     * @throws \DluTwBootstrap\Form\Exception\UnsupportedHelperTypeException
     */
    protected function getLabelHelper()
    {
        if (!$this->labelHelper) {
            if (method_exists($this->view, 'plugin')) {
                $this->labelHelper = $this->view->plugin('form_label_twb');
            }
            if (!$this->labelHelper instanceof FormLabelTwb) {
                throw new UnsupportedHelperTypeException('Label helper (FormLabelTwb) unavailable or unsupported type.');
            }
        }
        return $this->labelHelper;
    }

    /**
     * Retrieve the FormElementTwb helper
     * @return FormElementTwb
     * @throws \DluTwBootstrap\Form\Exception\UnsupportedHelperTypeException
     */
    protected function getElementHelper()
    {
        if (!$this->elementHelper) {
            if (method_exists($this->view, 'plugin')) {
                $this->elementHelper = $this->view->plugin('form_element_twb');
            }
            if (!$this->elementHelper instanceof FormElementTwb) {
                throw new UnsupportedHelperTypeException('Element helper (FormElementTwb) unavailable or unsupported type.');
            }
        }
        return $this->elementHelper;
    }

    /**
     * Retrieve the FormElementErrorsTwb helper
     * @return FormElementErrorsTwb
     * @throws \DluTwBootstrap\Form\Exception\UnsupportedHelperTypeException
     */
    protected function getElementErrorsHelper()
    {
        if (!$this->elementErrorsHelper) {
            if (method_exists($this->view, 'plugin')) {
                $this->elementErrorsHelper = $this->view->plugin('form_element_errors_twb');
            }
            if (!$this->elementErrorsHelper instanceof FormElementErrorsTwb) {
                throw new UnsupportedHelperTypeException('Element errors helper (FormElementErrorsTwb) unavailable or unsupported type.');
            }
        }
        return $this->elementErrorsHelper;
    }

    /**
     * Retrieve the FormHintTwb helper
     * @return FormHintTwb
     * @throws \DluTwBootstrap\Form\Exception\UnsupportedHelperTypeException
     */
    protected function getHintHelper()
    {
        if (!$this->hintHelper) {
            if (method_exists($this->view, 'plugin')) {
                $this->hintHelper = $this->view->plugin('form_hint_twb');
            }
            if (!$this->hintHelper instanceof FormHintTwb) {
                throw new UnsupportedHelperTypeException('Hint helper (FormHintTwb) unavailable or unsupported type.');
            }
        }
        return $this->hintHelper;
    }

    /**
     * Retrieve the FormDescriptionTwb helper
     * @return FormDescriptionTwb
     * @throws \DluTwBootstrap\Form\Exception\UnsupportedHelperTypeException
     */
    protected function getDescriptionHelper()
    {
        if (!$this->descriptionHelper) {
            if (method_exists($this->view, 'plugin')) {
                $this->descriptionHelper = $this->view->plugin('form_description_twb');
            }
            if (!$this->descriptionHelper instanceof FormDescriptionTwb) {
                throw new UnsupportedHelperTypeException('Description helper (FormDescriptionTwb) unavailable or unsupported type.');
            }
        }
        return $this->descriptionHelper;
    }

    /**
     * Retrieve the FormControlGroupTwb helper
     * @return FormControlGroupTwb
     * @throws \DluTwBootstrap\Form\Exception\UnsupportedHelperTypeException
     */
    protected function getControlGroupHelper()
    {
        if (!$this->controlGroupHelper) {
            if (method_exists($this->view, 'plugin')) {
                $this->controlGroupHelper = $this->view->plugin('form_control_group_twb');
            }
            if (!$this->controlGroupHelper instanceof FormControlGroupTwb) {
                throw new UnsupportedHelperTypeException('Control group helper (FormControlGroupTwb) unavailable or unsupported type.');
            }
        }
        return $this->controlGroupHelper;
    }

    /**
     * Retrieve the FormControlsTwb helper
     * @return FormControlsTwb
     * @throws \DluTwBootstrap\Form\Exception\UnsupportedHelperTypeException
     */
    protected function getControlsHelper()
    {
        if (!$this->controlsHelper) {
            if (method_exists($this->view, 'plugin')) {
                $this->controlsHelper = $this->view->plugin('form_controls_twb');
            }
            if (!$this->controlsHelper instanceof FormControlsTwb) {
                throw new UnsupportedHelperTypeException('Controls helper (FormControlsTwb) unavailable or unsupported type.');
            }
        }
        return $this->controlsHelper;
    }
}
