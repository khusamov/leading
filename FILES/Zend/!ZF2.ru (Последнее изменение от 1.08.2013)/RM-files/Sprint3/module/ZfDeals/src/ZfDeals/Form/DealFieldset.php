<?php
namespace ZfDeals\Form;

use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterProviderInterface;

class DealFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct()
    {
        parent::__construct('deal');

        $this->add(
            array(
                'name' => 'product',
                'type' => 'ZfDeals\Form\ProductSelectorFieldset',
            )
        );

        $this->add(
            array(
                'name' => 'price',
                'type' => 'Zend\Form\Element\Number',
                'attributes' => array(
                    'step' => 'any'
                ),
                'options' => array(
                    'label' => 'Цена:',
                )
            )
        );

        $this->add(
            array(
                'name' => 'startDate',
                'type' => 'Zend\Form\Element\Date',
                'options' => array(
                    'label' => 'Дата начала:'
                ),
            )
        );

        $this->add(
            array(
                'name' => 'endDate',
                'type' => 'Zend\Form\Element\Date',
                'options' => array(
                    'label' => 'Дата окончания:'
                ),
            )
        );
    }

    public function getInputFilterSpecification()
    {
        return array(
            'price' => array(
                'required' => true,
                'filters' => array(
                    array(
                       'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'message'  => "Пожалуйста, введите число."
                        ),
                    )
                )
            ),
            'startDate' => array (
                'required'   => true,
                'filters' => array(
                    array(
                       'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'Date',
                        'options' => array(
                            'message'  => "Пожалуйста, введите число."
                        ),
                    ),
                )
            ),
            'endDate' => array (
                'required'   => true,
                'filters' => array(
                    array(
                       'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'Date',
                        'options' => array(
                            'message'  => "Пожалуйста, введите число."
                        ),
                    ),
                )
            ),
        );
    }
}
