<?php
return array(
    'factories' => array(
        'ZfDeals\Mapper\Product' => function ($sm) {
            return new \ZfDeals\Mapper\Product(
                $sm->get('Zend\Db\Adapter\Adapter')
            );
        },
        'ZfDeals\Mapper\Deal' => function ($sm) {
            return new \ZfDeals\Mapper\Deal(
                $sm->get('Zend\Db\Adapter\Adapter')
            );
        },
        'ZfDeals\Mapper\Order' => function ($sm) {
            return new \ZfDeals\Mapper\Order(
                $sm->get('Zend\Db\Adapter\Adapter')
            );
        },
        'ZfDeals\Validator\DealAvailable' => function ($sm) {
            $validator = new \ZfDeals\Validator\DealActive();
            $validator->setDealMapper($sm->get('ZfDeals\Mapper\Deal'));
            $validator->setProductMapper($sm->get('ZfDeals\Mapper\Product'));
            return $validator;
        },
        'ZfDeals\Service\Checkout' => function ($sm) {
            $srv = new \ZfDeals\Service\Checkout();
            $srv->setDealAvailable($sm->get('ZfDeals\Validator\DealAvailable'));
            $srv->setProductMapper($sm->get('ZfDeals\Mapper\Product'));
            $srv->setOrderMapper($sm->get('ZfDeals\Mapper\Order'));
            $srv->setDealMapper($sm->get('ZfDeals\Mapper\Deal'));
            return $srv;
        },
    ),
);
