<?php
namespace DluTwBootstrap\Form\View\Helper;

use DluTwBootstrap\Form\Exception\UnsupportedElementTypeException;
use DluTwBootstrap\GenUtil;
use DluTwBootstrap\Form\FormUtil;

use Zend\Form\View\Helper\AbstractHelper as AbstractFormViewHelper;
use Zend\I18n\Translator\TranslatorAwareInterface;
use Zend\I18n\Translator\Translator;
use Zend\Form\FieldsetInterface;
use Zend\Form\ElementInterface;
use Zend\Form\Element\Collection as CollectionElement;

/**
 * FormFieldsetTwb
 * @package DluTwBootstrap
 * @copyright David Lukas (c) - http://www.zfdaily.com
 * @license http://www.zfdaily.com/code/license New BSD License
 * @link http://www.zfdaily.com
 * @link https://bitbucket.org/dlu/dlutwbootstrap
 */
class FormFieldsetTwb extends AbstractFormViewHelper implements TranslatorAwareInterface
{
    /**
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
    public function __construct(GenUtil $genUtil, FormUtil $formUtil)
    {
        $this->genUtil  = $genUtil;
        $this->formUtil = $formUtil;
    }

    /**
     * Returns the fieldset opening tag and legend tag, if legend is defined
     * @param FieldsetInterface $fieldset
     * @param string|null $formType
     * @param array $displayOptions
     * @return string
     */
    public function openTag(FieldsetInterface $fieldset, $formType = null, array $displayOptions = array()) {
        $formType   = $this->formUtil->filterFormType($formType);
        $class      = $fieldset->getAttribute('class');
        if (array_key_exists('class', $displayOptions)) {
            $class  = $this->genUtil->addWords($displayOptions['class'], $class);
        }
        $escapeHtmlAttrHelper   = $this->getEscapeHtmlAttrHelper();
        $class                  = $this->genUtil->escapeWords($class, $escapeHtmlAttrHelper);
        $fieldset->setAttribute('class', $class);
        if ($class) {
            $classAttrib        = sprintf(' class="%s"', $class);
        } else {
            $classAttrib        = '';
        }
        $html   = sprintf('<fieldset%s>', $classAttrib);
        $legend = $fieldset->getOption('legend');
        if ($legend
            && (!array_key_exists('display_legend', $displayOptions) || $displayOptions['display_legend'])
            && ($formType == FormUtil::FORM_TYPE_HORIZONTAL || $formType == FormUtil::FORM_TYPE_VERTICAL)) {
            //Translate
            if (null !== ($translator = $this->getTranslator())) {
                $legend = $translator->translate($legend, $this->getTranslatorTextDomain());
            }
            //Escape
            $escapeHelper   = $this->getEscapeHtmlHelper();
            $legend         = $escapeHelper($legend);
            $html           .= "<legend>$legend</legend>";
        }
        return $html;
    }

    /**
     * Returns the fieldset closing tag
     * @return string
     */
    public function closeTag() {
        return '</fieldset>';
    }

    /**
     * Renders the fieldset content
     * @param FieldsetInterface $fieldset
     * @param string|null $formType
     * @param array $displayOptions
     * @param bool $displayButtons
     * @param bool $renderErrors
     * @throws \DluTwBootstrap\Form\Exception\UnsupportedElementTypeException
     * @return string
     */
    public function content(FieldsetInterface $fieldset,
                            $formType = null,
                            array $displayOptions = array(),
                            $displayButtons = true,
                            $renderErrors = true
    ) {
        $renderer = $this->getView();
        if (!method_exists($renderer, 'plugin')) {
            // Bail early if renderer is not pluggable
            return '';
        }
        $formType   = $this->formUtil->filterFormType($formType);
        $rowHelper  = $renderer->plugin('form_row_twb');
        $iterator   = $fieldset->getIterator();
        $html       = '';
        if (array_key_exists('fieldsets', $displayOptions)) {
            $displayOptionsFieldsets    = $displayOptions['fieldsets'];
        } else {
            $displayOptionsFieldsets    = array();
        }
        if (array_key_exists('elements', $displayOptions)) {
            $displayOptionsElements     = $displayOptions['elements'];
        } else {
            $displayOptionsElements     = array();
        }
        //Iterate over all fieldset elements and render them
        foreach($iterator as $elementOrFieldset) {
            $elementName        = $elementOrFieldset->getName();
            $elementBareName    = $this->formUtil->getBareElementName($elementName);
            $templateMarkup = "";

            if ($elementOrFieldset instanceof FieldsetInterface) {

                //Fieldset
                /* @var $elementOrFieldset FieldsetInterface */
                //Get fieldset display options
                if (array_key_exists($elementBareName, $displayOptionsFieldsets)) {
                    $displayOptionsFieldset = $displayOptionsFieldsets[$elementBareName];
                } else {
                    $displayOptionsFieldset = array();
                }


                $renderedMarkup = $this->render($elementOrFieldset,
                    $formType,
                    $displayOptionsFieldset,
                    true,
                    true,
                    $renderErrors);

                $html   .= "\n" . $renderedMarkup;

                if ($fieldset instanceof CollectionElement && $fieldset->shouldCreateTemplate()) {
                    $templateMarkup = $this->renderTemplate($fieldset);
                }

            } elseif ($elementOrFieldset instanceof ElementInterface) {

                //Element
                /* @var $element ElementInterface */
                if (!$displayButtons && in_array($elementOrFieldset->getAttribute('type'), array('submit', 'reset', 'button'))) {
                    //We should ignore 'button' elements and this is a 'button' element, so skip the rest of the iteration
                    continue;
                }
                //Get element display options
                if (array_key_exists($elementBareName, $displayOptionsElements)) {
                    $displayOptionsElement  = $displayOptionsElements[$elementBareName];
                } else {
                    $displayOptionsElement  = array();
                }
                $html   .= "\n" . $rowHelper($elementOrFieldset, $formType, $displayOptionsElement, $renderErrors);

                if ($fieldset instanceof CollectionElement && $fieldset->shouldCreateTemplate()) {
                    $templateMarkup .= $rowHelper($elementOrFieldset);
                }

            } else {
                //Unsupported item type
                throw new UnsupportedElementTypeException('Fieldsets may contain only fieldsets or elements.');
            }
        }

        // If $templateMarkup is not empty, use it for simplify adding new element in JavaScript
        if (!empty($templateMarkup)) {
            $escapeHtmlAttribHelper = $this->getEscapeHtmlAttrHelper();

            $html .= sprintf(
                '<span data-template="%s"></span>',
                $escapeHtmlAttribHelper($templateMarkup)
            );
        }

        return $html;
    }

    /**
     * Only render a template
     *
     * @param  CollectionElement            $collection
     * @return string
     */
    public function renderTemplate(CollectionElement $collection)
    {
        $templateMarkup         = '';

        $elementOrFieldset = $collection->getTemplateElement();

        if ($elementOrFieldset instanceof FieldsetInterface) {
            $templateMarkup .= $this->render($elementOrFieldset);
        }

        return $templateMarkup;
    }

    /**
     * @param FieldsetInterface $fieldset
     * @param string|null $formType
     * @param array $displayOptions
     * @param bool $displayButtons Should buttons found in this fieldset be rendered?
     * @param bool $renderFieldsetTag Should we render the <fieldset> tag around the fieldset?
     * @param bool $renderErrors
     * @return string
     */
    public function render(FieldsetInterface $fieldset,
                           $formType = null,
                           array $displayOptions = array(),
                           $displayButtons = true,
                           $renderFieldsetTag = true,
                           $renderErrors = true
    ) {
        $formType   = $this->formUtil->filterFormType($formType);
        $html       = '';
        if ($renderFieldsetTag) {
            $html   .= $this->openTag($fieldset, $formType, $displayOptions);
        }
        $html   .= "\n" . $this->content($fieldset, $formType, $displayOptions, $displayButtons, $renderErrors);
        if ($renderFieldsetTag) {
            $html       .= "\n" . $this->closeTag();
        }
        return $html;
    }

    /**
     * @param FieldsetInterface|null $fieldset
     * @param string|null $formType
     * @param array $displayOptions
     * @param bool $displayButtons Should buttons found in this fieldset be rendered?
     * @param bool $renderFieldsetTag Should we render the <fieldset> tag around the fieldset?
     * @param bool $renderErrors
     * @return string
     */
    public function __invoke(FieldsetInterface $fieldset = null,
                             $formType = null,
                             array $displayOptions = array(),
                             $displayButtons = true,
                             $renderFieldsetTag = true,
                             $renderErrors = true
    ) {
        if(is_null($fieldset)) {
            return $this;
        }
        return $this->render($fieldset, $formType, $displayOptions, $displayButtons, $renderFieldsetTag, $renderErrors);
    }
}