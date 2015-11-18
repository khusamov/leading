<?php
namespace DluTwBootstrap\Form\View\Helper;

use DluTwBootstrap\Form\FormUtil;
use DluTwBootstrap\GenUtil;

use Zend\Form\ElementInterface;
use Zend\Form\View\Helper\FormPassword;

/**
 * FormPasswordTwb
 * @package DluTwBootstrap
 * @copyright David Lukas (c) - http://www.zfdaily.com
 * @license http://www.zfdaily.com/code/license New BSD License
 * @link http://www.zfdaily.com
 * @link https://bitbucket.org/dlu/dlutwbootstrap
 */
class FormPasswordTwb extends FormPassword
{
    /**
     * @var FormUtil
     */
    protected $formUtil;

    /**
     * @var GenUtil
     */
    protected $genUtil;

    /* ******************** METHODS ******************** */

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
     * Prepares the element prior to rendering
     * @param \Zend\Form\ElementInterface $element
     * @param string $formType
     * @param array $displayOptions
     * @return void
     */
    protected function prepareElementBeforeRendering(ElementInterface $element, $formType, array $displayOptions)
    {
        if(array_key_exists('class', $displayOptions)) {
            $class                  = $element->getAttribute('class');
            $class                  = $this->genUtil->addWords($displayOptions['class'], $class);
            $escapeHtmlAttrHelper   = $this->getEscapeHtmlAttrHelper();
            $class                  = $this->genUtil->escapeWords($class, $escapeHtmlAttrHelper);
            $element->setAttribute('class', $class);
        }
        $this->formUtil->addIdAttributeIfMissing($element);
    }

    /**
     * Render a form <input> password element from the provided $element,
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
        //Text prepend / append
        $escapeHelper       = $this->getEscapeHtmlHelper();
        $escapeAttribHelper = $this->getEscapeHtmlAttrHelper();
        $prepAppClass       = '';
        //Prepend icon (not possible on Search forms)
        if (($formType != FormUtil::FORM_TYPE_SEARCH) && array_key_exists('prependIcon', $displayOptions)) {
            $prepAppClass   = $this->genUtil->addWords('input-prepend', $prepAppClass);
            $html           = sprintf('<span class="add-on"><i class="%s"></i></span>%s',
                                      $escapeAttribHelper($displayOptions['prependIcon']), $html);
        }
        //Prepend text
        if ($element->getOption('prependText')) {
            $prepAppClass   = $this->genUtil->addWords('input-prepend', $prepAppClass);
            $html           = '<span class="add-on">' . $escapeHelper($element->getOption('prependText')) . '</span>'
                . $html;
        }
        //Append icon (not possible on Search forms)
        if (($formType != FormUtil::FORM_TYPE_SEARCH) && array_key_exists('appendIcon', $displayOptions)) {
            $prepAppClass   = $this->genUtil->addWords('input-append', $prepAppClass);
            $html           .= sprintf('<span class="add-on"><i class="%s"></i></span>',
                                       $escapeAttribHelper($displayOptions['appendIcon']));
        }
        //Append text
        if ($element->getOption('appendText')) {
            $prepAppClass   = $this->genUtil->addWords('input-append', $prepAppClass);
            $html           .= '<span class="add-on">' . $escapeHelper($element->getOption('appendText')) . '</span>';
        }
        if ($prepAppClass) {
            $html           = '<div class="' . $prepAppClass . '">' . "\n$html\n" . '</div>';
        }
        return $html;
    }

    /**
     * Invoke helper as function
     * Proxies to {@link render()}.
     * @param  ElementInterface|null $element
     * @param  null|string $formType
     * @param  array $displayOptions
     * @return string|FormPasswordTwb
     */
    public function __invoke(ElementInterface $element = null, $formType = null, array $displayOptions = array())
    {
        if (!$element) {
            return $this;
        }
        return $this->render($element, $formType, $displayOptions);
    }
}