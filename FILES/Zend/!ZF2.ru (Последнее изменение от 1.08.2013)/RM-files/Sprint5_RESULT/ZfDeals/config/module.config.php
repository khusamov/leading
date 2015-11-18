<?php
return array(
    'router' => array(
        'routes' => array(
            'zf-deals' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/deals',
                    'defaults' => array(
                        'controller' => 'ZfDeals\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            'zf-deals\checkout' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/deals/checkout',
                    'defaults' => array(
                        'controller' => 'ZfDeals\Controller\CheckoutForm'
                    ),
                ),
            ),
            'zf-deals\admin\home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/deals/admin',
                    'defaults' => array(
                        'controller' => 'ZfDeals\Controller\Admin',
                        'action'     => 'index',
                    ),
                ),
            ),
            'zf-deals\admin\product\add' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/deals/admin/product/add',
                    'defaults' => array(
                        'controller' => 'ZfDeals\Controller\ProductAddForm',
                    ),
                ),
            ),
            'zf-deals\admin\deal\add' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/deals/admin/deal/add',
                    'defaults' => array(
                        'controller' => 'ZfDeals\Controller\DealAddForm',
                    ),
                ),
            ),
            'zf-deals\admin\orders\show' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/deals/admin/orders/show',
                    'defaults' => array(
                        'controller' => 'ZfDeals\Controller\Order',
                        'action' => 'show-all'
                    ),
                ),
            ),
        ),
    ),
   'view_manager' => array(
        'template_map' => array(
            'zf-deals/layout/admin'   => __DIR__ . '/../view/layout/admin.phtml',
            'zf-deals/layout/site'   => __DIR__ . '/../view/layout/site.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'translator' => array(
        'locale' => 'ru_RU',
        'translation_file_patterns' => array(array(
            'type' => 'phpArray',
            'base_dir'  => __DIR__ . '/../data/language',
            'pattern'  => '%s.php',
        )),
    ),
);
