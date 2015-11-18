<?php
namespace DluTwBootstrap\Form\View\Helper;

use DluTwBootstrap\GenUtil;

use Zend\Form\View\Helper\AbstractHelper as AbstractFormViewHelper;
use Zend\Form\ElementInterface;
use Zend\Form\View\Helper\FormMultiCheckbox;
use Traversable;

/**
 * FormMulticheckboxTwb
 * @package DluTwBootstrap
 * @copyright David Lukas (c) - http://www.zfdaily.com
 * @license http://www.zfdaily.com/code/license New BSD License
 * @link http://www.zfdaily.com
 * @link https://bitbucket.org/dlu/dlutwbootstrap
 */
class FormMultiCheckboxTwb extends AbstractFormViewHelper
{
    /**
     * @var array
     */
    protected $twbLabelAttributes  = array(
        'class'     => 'checkbox',
    );

    /**
     * @var GenUtil
     */
    protected $genUtil;

    /**
     * ZF2 multi checkbox helper
     * @var FormMultiCheckbox
     */
    protected $formMultiCheckboxHelper;

    /* ************************ METHODS ***************************** */

    /**
     * Constructor
     * @param \Zend\Form\View\Helper\FormMultiCheckbox $formMultiCheckboxHelper
     * @param \DluTwBootstrap\GenUtil $genUtil
     */
    public function __construct(FormMultiCheckbox $formMultiCheckboxHelper, GenUtil $genUtil)
    {
        $this->formMultiCheckboxHelper  = $formMultiCheckboxHelper;
        $this->genUtil                  = $genUtil;
    }

    /**
     * Invoke helper as function
     * Proxies to {@link render()}.
     * @param  ElementInterface|null $element
     * @param null|string $formType
     * @param array $displayOptions
     * @return string|FormMultiCheckboxTwb
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
        $formMultiCheckboxHelper    = $this->formMultiCheckboxHelper;
        $formMultiCheckboxHelper->setLabelAttributes($labelAttributes);
        return $formMultiCheckboxHelper($element);
    }
}