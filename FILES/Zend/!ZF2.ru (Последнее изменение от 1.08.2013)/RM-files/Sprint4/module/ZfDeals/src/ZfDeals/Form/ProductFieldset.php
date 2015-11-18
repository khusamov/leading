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

        $this->add(
            array(
                'name' => 'productId',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'ID товара:',
                )
            )
        );


        $this->add(
            array(
                'name' => 'name',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'Название товара:',
                )
            )
        );

        $this->add(
            array(
                'name' => 'stock',
                'type' => 'Zend\Form\Element\Number',
                'attributes' => array(
                    'step' => 1,
                    'min' => 0
                ),
                'options' => array(
                    'label' => 'Количество:'
                ),
            )
        );
    }

    public function getInputFilterSpecification()
    {
        return array(
            'productId' => array (
                'required' => true,
                'filters' => array(
                    array(
                       'name' => 'StringTrim'
                    )
                ),
            ),
            'name' => array (
                'required' => true,
                'filters' => array(
                    array(
                       'name' => 'StringTrim'
                    )
                ),
            )
        );
    }
}
