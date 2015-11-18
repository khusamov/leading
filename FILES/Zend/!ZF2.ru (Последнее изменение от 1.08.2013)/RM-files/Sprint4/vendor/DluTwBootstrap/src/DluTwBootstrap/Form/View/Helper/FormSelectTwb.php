<?php
namespace DluTwBootstrap\Form\View\Helper;

use \DluTwBootstrap\GenUtil;
use \DluTwBootstrap\Form\FormUtil;

use Zend\Form\View\Helper\FormSelect;
use Zend\Form\ElementInterface;
use Zend\Form\Exception;

/**
 * FormSelectTwb
 * @package DluTwBootstrap
 * @copyright David Lukas (c) - http://www.zfdaily.com
 * @license http://www.zfdaily.com/code/license New BSD License
 * @link http://www.zfdaily.com
 * @link https://bitbucket.org/dlu/dlutwbootstrap
 */
class FormSelectTwb extends FormSelect
{
    /**
     * General utils
     * @var GenUtil
     */
    protected $genUtil;

    /**
     * Form utils
     * @var \DluTwBootstrap\Form\FormUtil
     */
    protected $formUtil;

    /* **************************** METHODS ****************************** */

    /**
     * Constructor
     * @param \DluTwBootstrap\GenUtil $genUtil
     * @param \DluTwBootstrap\Form\FormUtil $formUtil
     */
    public function __construct(GenUtil $genUtil, FormUtil $formUtil)
    {
        $this->genUtil  = $genUtil;
        $this->formUtil = $formUtil;
    }

    /**
     * Render a form <select> element from the provided $element
     * @param  ElementInterface $element
     * @param null|string $formType
     * @param array $displayOptions
     * @return string
     */
    public function render(ElementInterface $element, $formType = null, array $displayOptions = array())
    {
        if (array_key_exists('class', $displayOptions)) {
            $class                  = $element->getAttribute('class');
            $class                  = $this->genUtil->addWords($displayOptions['class'], $class);
            $escapeHtmlAttrHelper   = $this->getEscapeHtmlAttrHelper();
            $class                  = $this->genUtil->escapeWords($class, $escapeHtmlAttrHelper);
            $element->setAttribute('class', $class);
        }
        if (array_key_exists('size', $displayOptions)) {
            $element->setAttribute('size', (int)$displayOptions['size']);
        }
        $this->formUtil->addIdAttributeIfMissing($element);
        $html               = parent::render($element);
        return $html;
    }

    /**
     * Invoke helper as function
     * Proxies to {@link render()}.
     * @param  ElementInterface $element
     * @param null|string $formType
     * @param array $displayOptions
     * @return string|FormSelectTwb
     */
    public function __invoke(ElementInterface $element = null, $formType = null, array $displayOptions = array()) {
        if (!$element) {
            return $this;
        }
        return $this->render($element, $formType, $displayOptions);
    }
}