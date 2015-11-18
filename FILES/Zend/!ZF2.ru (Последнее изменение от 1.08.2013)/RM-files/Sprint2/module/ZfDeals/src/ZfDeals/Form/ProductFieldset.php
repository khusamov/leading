<?php
namespace ZfDeals\Form;

use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterProviderInterface;

class ProductFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct()
    {
        parent::__construct('product');

        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'ID товара:',
            )
        ));


        $this->add(array(
            'name' => 'name',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Название товара:',
            )
        ));

        $this->add(array(
            'name' => 'stock',
            'attributes' => array(
                'type'  => 'number',
            ),
            'options' => array(
                'label' => '# Количество:'
            ),
        ));
    }

    public function getInputFilterSpecification()
    {
        return array(
            'id' => array (
                'required'   => true,
                'filters' => array(
                    array(
                       'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'message'  => "Пожалуйста, введите ID продукта."
                        ),
                    )
                )
            ),
            'name' => array (
                'required'   => true,
                'filters' => array(
                    array(
                       'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'message'  => "Пожалуйста, введите название продукта."
                        ),
                    )
                )
            ),
            'stock' => array (
                'required'   => true,
                'filters' => array(
                    array(
                       'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'message'  => "Пожалуйста, укажите количество."
                        ),
                    ),
                    array(
                        'name' => 'Digits',
                        'options' => array(
                            'message'  => "Пожалуйста, введите целое число."
                        ),
                    ),
                    array(
                        'name' => 'GreaterThan',
                        'options' => array(
                            'min' => 0,
                            'message'  => "Пожалуйста, введите значение >= 0."
                        ),
                    )
                )
            ),
        );
    }
}
