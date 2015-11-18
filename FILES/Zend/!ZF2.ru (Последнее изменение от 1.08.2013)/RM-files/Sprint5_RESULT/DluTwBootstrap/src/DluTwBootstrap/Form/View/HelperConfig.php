<?php
namespace DluTwBootstrap\Form\View;

use DluTwBootstrap\GenUtil;
use DluTwBootstrap\Form\FormUtil;

use Zend\ServiceManager\ConfigInterface;
use Zend\ServiceManager\ServiceManager;

/**
 * HelperConfig
 * Service manager configuration for form view helpers
 * @package DluTwBootstrap
 * @copyright David Lukas (c) - http://www.zfdaily.com
 * @license http://www.zfdaily.com/code/license New BSD License
 * @link http://www.zfdaily.com
 * @link https://bitbucket.org/dlu/dlutwbootstrap
 */
class HelperConfig implements ConfigInterface
{
    /**
     * @var array Pre-aliased view helpers
     */
    protected $invokables = array(
        'formcontrolgrouptwb'                   => 'DluTwBootstrap\Form\View\Helper\FormControlGroupTwb',
        'formcontrolstwb'                       => 'DluTwBootstrap\Form\View\Helper\FormControlsTwb',
        'formdescriptiontwb'                    => 'DluTwBootstrap\Form\View\Helper\FormDescriptionTwb',
        'formelementtwb'                        => 'DluTwBootstrap\Form\View\Helper\FormElementTwb',
        'formhiddentwb'                         => 'DluTwBootstrap\Form\View\Helper\FormHiddenTwb',
        'formhinttwb'                           => 'DluTwBootstrap\Form\View\Helper\FormHintTwb',
    );

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
     * Configure the provided service manager instance with the configuration
     * in this class.
     *
     * In addition to using each of the internal properties to configure the
     * service manager, also adds an initializer to inject ServiceManagerAware
     * classes with the service manager.
     *
     * @param  ServiceManager $serviceManager
     * @return void
     */
    public function configureServiceManager(ServiceManager $serviceManager)
    {
        foreach ($this->invokables as $name => $service) {
            $serviceManager->setInvokableClass($name, $service);
        }
        $factories  = $this->getFactories();
        foreach ($factories as $name => $factory) {
            $serviceManager->setFactory($name, $factory);
        }
    }

    /**
     * Returns an array of view helper factories
     * @return array
     */
    protected function getFactories()
    {
        $genUtil    = $this->genUtil;
        $formUtil   = $this->formUtil;
        return array(
            'formactionstwb'                    => function($sm) use ($formUtil) {
                $instance       = new \DluTwBootstrap\Form\View\Helper\FormActionsTwb($formUtil);
                return $instance;
            },
            'formbuttontwb'                     => function($sm) use ($genUtil) {
                $instance       = new \DluTwBootstrap\Form\View\Helper\FormButtonTwb($genUtil);
                return $instance;
            },
            'formcheckboxtwb'                   => function($sm) use ($formUtil) {
                $instance       = new \DluTwBootstrap\Form\View\Helper\FormCheckboxTwb($formUtil);
                return $instance;
            },
            'formelementerrorstwb'              => function($sm) use ($genUtil) {
                $instance       = new \DluTwBootstrap\Form\View\Helper\FormElementErrorsTwb($genUtil);
                return $instance;
            },
            'formfieldsettwb'                   => function($sm) use ($genUtil, $formUtil) {
                $instance       = new \DluTwBootstrap\Form\View\Helper\FormFieldsetTwb($genUtil, $formUtil);
                return $instance;
            },
            'formfiletwb'                       => function($sm) use ($formUtil) {
                $instance       = new \DluTwBootstrap\Form\View\Helper\FormFileTwb($formUtil);
                return $instance;
            },
            'forminputtwb'                      => function($sm) use ($formUtil) {
                $instance       = new \DluTwBootstrap\Form\View\Helper\FormInputTwb($formUtil);
                return $instance;
            },
            'formlabeltwb'                      => function($sm) use ($genUtil) {
                $formLabelHelper    = $sm->get('formLabel');
                $instance           = new \DluTwBootstrap\Form\View\Helper\FormLabelTwb($formLabelHelper, $genUtil);
                return $instance;
            },
            'formmulticheckboxtwb'              => function($sm) use ($genUtil) {
                $formMultiCheckboxHelper    = $sm->get('formMultiCheckbox');
                $instance                   = new \DluTwBootstrap\Form\View\Helper\FormMultiCheckboxTwb(
                                                $formMultiCheckboxHelper, $genUtil);
                return $instance;
            },
            'formpasswordtwb'                   => function($sm) use ($genUtil, $formUtil) {
                $instance       = new \DluTwBootstrap\Form\View\Helper\FormPasswordTwb($genUtil, $formUtil);
                return $instance;
            },
            'formradiotwb'                      => function($sm) use ($genUtil) {
                $formRadioHelper            = $sm->get('formRadio');
                $instance                   = new \DluTwBootstrap\Form\View\Helper\FormRadioTwb(
                                                $formRadioHelper, $genUtil);
                return $instance;
            },
            'formresettwb'                      => function($sm) use ($genUtil) {
                $instance       = new \DluTwBootstrap\Form\View\Helper\FormResetTwb($genUtil);
                return $instance;
            },
            'formrowtwb'                        => function($sm) use ($genUtil, $formUtil) {
                $instance       = new \DluTwBootstrap\Form\View\Helper\FormRowTwb($genUtil, $formUtil);
                return $instance;
            },
            'formselecttwb'                     => function($sm) use ($genUtil, $formUtil) {
                $instance       = new \DluTwBootstrap\Form\View\Helper\FormSelectTwb($genUtil, $formUtil);
                return $instance;
            },
            'formsubmittwb'                     => function($sm) use ($genUtil) {
                $instance       = new \DluTwBootstrap\Form\View\Helper\FormSubmitTwb($genUtil);
                return $instance;
            },
            'formtexttwb'                       => function($sm) use ($genUtil, $formUtil) {
                $instance       = new \DluTwBootstrap\Form\View\Helper\FormTextTwb($genUtil, $formUtil);
                return $instance;
            },
            'formtextareatwb'                   => function($sm) use ($genUtil, $formUtil) {
                $instance       = new \DluTwBootstrap\Form\View\Helper\FormTextareaTwb($genUtil, $formUtil);
                return $instance;
            },
            'formtwb'                           => function($sm) use ($genUtil, $formUtil) {
                $instance       = new \DluTwBootstrap\Form\View\Helper\FormTwb($genUtil, $formUtil);
                return $instance;
            },
        );
    }
}
