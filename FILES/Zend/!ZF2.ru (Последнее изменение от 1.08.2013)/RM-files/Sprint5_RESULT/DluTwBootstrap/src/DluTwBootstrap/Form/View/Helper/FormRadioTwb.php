<?php
namespace DluTwBootstrap\Form\View\Helper;

use DluTwBootstrap\GenUtil;

use Zend\Form\View\Helper\AbstractHelper as AbstractFormViewHelper;
use Zend\Form\View\Helper\FormRadio;
use Zend\Form\ElementInterface;

/**
 * FormRadioTwb
 * @package DluTwBootstrap
 * @copyright David Lukas (c) - http://www.zfdaily.com
 * @license http://www.zfdaily.com/code/license New BSD License
 * @link http://www.zfdaily.com
 * @link https://bitbucket.org/dlu/dlutwbootstrap
 */
class FormRadioTwb extends AbstractFormViewHelper
{
    /**
     * @var array
     */
    protected $twbLabelAttributes  = array(
        'class'     => 'radio',
    );

    /**
     * @var GenUtil
     */
    protected $genUtil;

    /**
     * ZF2 radio helper
     * @var FormRadio
     */
    protected $formRadioHelper;

    /* ************************ METHODS ***************************** */

    /**
     * Constructor
     * @param FormRadio $formRadioHelper
     * @param GenUtil $genUtil
     */
    public function __construct(FormRadio $formRadioHelper, GenUtil $genUtil)
    {
        $this->formRadioHelper  = $formRadioHelper;
        $this->genUtil          = $genUtil;
    }

    /**
     * Invoke helper as function
     * Proxies to {@link render()}.
     * @param  ElementInterface|null $element
     * @param null|string $formType
     * @param array $displayOptions
     * @return string|FormRadioTwb
     */
    public function __invoke(ElementInterface $element = null, $formType = null, array $displayOptions = array())
    {
        if (!$element) {
            return $this;
        }
        return $this->render($element, $formType, $displayOptions);
    }

    /**
     * Render a form <input> element from the provided $element
     * @param  ElementInterface $element
     * @param null|string $formType
     * @param array $displayOptions
     * @return string
     */
    public function render(ElementInterface $element, $formType = null, array $displayOptions = array())
    {
        $labelAttributes    = $this->twbLabelAttributes;
        if(array_key_exists('inline', $displayOptions) && $displayOptions['inline'] == true) {
            $labelAttributes = $this->genUtil->addWordsToArrayItem('inline', $labelAttributes, 'class');
        }
        $formRadioHelper    = $this->formRadioHelper;
        $formRadioHelper->setLabelAttributes($labelAttributes);
        return $formRadioHelper($element);
    }
}