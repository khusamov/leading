<?php
namespace DluTwBootstrap\Form;

use DluTwBootstrap\Exception\InvalidParameterException;

use Zend\Form\ElementInterface;

/**
 * Form Utilities
 * @package DluTwBootstrap
 * @copyright David Lukas (c) - http://www.zfdaily.com
 * @license http://www.zfdaily.com/code/license New BSD License
 * @link http://www.zfdaily.com
 * @link https://bitbucket.org/dlu/dlutwbootstrap
 */
class FormUtil
{
    /**
     * Form type Horizontal
     * @var string
     */
    const FORM_TYPE_HORIZONTAL  = 'horizontal';

    /**
     * Form type Vertical
     * @var string
     */
    const FORM_TYPE_VERTICAL    = 'vertical';

    /**
     * Form type Inline
     * @var string
     */
    const FORM_TYPE_INLINE      = 'inline';

    /**
     * Form type Search
     * @var string
     */
    const FORM_TYPE_SEARCH      = 'search';

    /**
     * Supported form types
     * @var array
     */
    protected $supportedFormTypes   = array(
        self::FORM_TYPE_HORIZONTAL,
        self::FORM_TYPE_VERTICAL,
        self::FORM_TYPE_INLINE,
        self::FORM_TYPE_SEARCH,
    );

    /**
     * Default form type
     * @var string
     */
    protected $defaultFormType;

    /* ********************************** METHODS ***************************** */

    /**
     * Constructor
     * @param string|null $defaultFormType
     */
    public function __construct($defaultFormType = null)
    {
        $this->setDefaultFormType($defaultFormType);
    }

    /**
     * If the 'id' attribute of the element is not defined, it is set to equal the element's name value
     * //TODO - escape html attr?
     * @param ElementInterface $element
     */
    public function addIdAttributeIfMissing(ElementInterface $element)
    {
        if (!$element->getAttribute('id')) {
            $element->setAttribute('id', $element->getName());
        }
    }

    /**
     * Sets the default form type
     * @param string $defaultFormType
     */
    public function setDefaultFormType($defaultFormType)
    {
        if (!$this->isFormTypeSupported($defaultFormType)) {
            $defaultFormType    = self::FORM_TYPE_HORIZONTAL;
        }
        $this->defaultFormType = $defaultFormType;
    }

    /**
     * Returns the default form type
     * @return string
     */
    public function getDefaultFormType()
    {
        return $this->defaultFormType;
    }

    /**
     * Is the specified form type supported?
     * @param string $formType
     * @return bool
     */
    public function isFormTypeSupported($formType)
    {
        return in_array($formType, $this->supportedFormTypes);
    }

    /**
     * Filters the specified form type and returns it - if null, uses the default, otherwise checks if the type is supported
     * @param $formType
     * @return string
     * @throws \DluTwBootstrap\Exception\InvalidParameterException
     */
    public function filterFormType($formType)
    {
        if (is_null($formType)) {
            $formType   = $this->getDefaultFormType();
        }
        if (!$this->isFormTypeSupported($formType)) {
            throw new InvalidParameterException(sprintf("Form type '%s' is not supported.", $formType));
        }
        return $formType;
    }

    /**
     * Returns a bare element name extracted from a hierarchical element name
     * E.g. for 'person[contacts][tel]' returns 'tel'
     * If the passed name is not hierarchical, returns it as it is
     * @param string $hierarchicalName
     * @return string
     */
    public function getBareElementName($hierarchicalName)
    {
        $lastLeftBracketPos = strrpos($hierarchicalName, '[');
        if ($lastLeftBracketPos === false) {
            //The passed name is not hierarchical
            $bareName   = $hierarchicalName;
        } else {
            //The passed name is hierarchical
            $bareName   = substr($hierarchicalName, $lastLeftBracketPos + 1, -1);
        }
        return $bareName;
    }
}