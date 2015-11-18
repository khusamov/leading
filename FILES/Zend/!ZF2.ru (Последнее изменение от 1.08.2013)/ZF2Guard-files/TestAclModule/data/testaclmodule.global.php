<?php
return array('testaclmodule' => array(
    'allow' => array(
        array(array('guest'), 'TestAclModule\Controller\Frontend'),
        array(array('admin'), 'TestAclModule\Controller\Backend'),
        array(array('admin'), null),
    ),
    'deny' => array(),
));
