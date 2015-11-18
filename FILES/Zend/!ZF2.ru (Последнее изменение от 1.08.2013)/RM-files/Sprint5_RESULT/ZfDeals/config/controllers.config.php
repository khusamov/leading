<?php
return array(
    'invokables' => array(
        'ZfDeals\Controller\Admin' => 'ZfDeals\Controller\AdminController',
    ),
    'factories' => array(
        'ZfDeals\Controller\CheckoutForm' => function ($serviceLocator) {
            $form = new \ZfDeals\Form\Checkout();
            $ctr = new ZfDeals\Controller\CheckoutFormController($form);
            $productMapper = $serviceLocator->getServiceLocator()->get('ZfDeals\Mapper\Product');
            $ctr->setProductMapper($productMapper);
            $validator = $serviceLocator->getServiceLocator()->get('ZfDeals\Validator\DealAvailable');
            $ctr->setdealActiveValidator($validator);
            $checkoutService = $serviceLocator->getServiceLocator()->get('ZfDeals\Service\Checkout');
            $ctr->setCheckoutService($checkoutService);
            return $ctr;
        },
        'ZfDeals\Controller\DealAddForm' => function ($serviceLocator) {
            $form = new ZfDeals\Form\DealAdd();
            $ctr = new ZfDeals\Controller\DealAddFormController($form);
            $dealMapper = $serviceLocator->getServiceLocator()->get('ZfDeals\Mapper\Deal');
            $ctr->setDealMapper($dealMapper);
            $productMapper = $serviceLocator->getServiceLocator()->get('ZfDeals\Mapper\Product');
            $ctr->setProductMapper($productMapper);
            return $ctr;
        },
        'ZfDeals\Controller\ProductAddForm' => function ($serviceLocator) {
            $form = new \ZfDeals\Form\ProductAdd();
            $ctr = new ZfDeals\Controller\ProductAddFormController($form);
            $productMapper = $serviceLocator->getServiceLocator()->get('ZfDeals\Mapper\Product');
            $ctr->setProductMapper($productMapper);
            return $ctr;
        },
        'ZfDeals\Controller\Index' => function ($serviceLocator) {
            $ctr = new ZfDeals\Controller\IndexController();
            $productMapper = $serviceLocator->getServiceLocator()->get('ZfDeals\Mapper\Product');
            $dealMapper = $serviceLocator->getServiceLocator()->get('ZfDeals\Mapper\Deal');
            $ctr->setDealMapper($dealMapper);
            $ctr->setProductMapper($productMapper);
            return $ctr;
        },
        'ZfDeals\Controller\Order' => function ($serviceLocator) {
            $ctr = new ZfDeals\Controller\OrderController();
            $ctr->setOrderMapper($serviceLocator->getServiceLocator()->get('ZfDeals\Mapper\Order'));
            return $ctr;
        },
    ),
);
