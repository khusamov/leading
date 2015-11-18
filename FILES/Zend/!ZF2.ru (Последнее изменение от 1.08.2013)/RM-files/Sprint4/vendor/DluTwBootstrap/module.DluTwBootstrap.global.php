<?php
/* ************************* NOTE ******************************
 * If you do not have your own layout view script referencing  *
 * the necessary Twitter Bootstrap and jQuery dependencies     *
 * move this file to <your project>/config/autoload directory  *
 * *************************************************************
 */

/**
 * DluTwBootstrap - Global configuration override
 * Responsibility: Set layout to the layout script provided with the DluTwBootstrap package to set-up
 * the Twitter Bootstrap environment.
 * @package DluTwBootstrap
 * @copyright David Lukas (c) - http://www.zfdaily.com
 * @license http://www.zfdaily.com/code/license New BSD License
 * @link http://www.zfdaily.com
 * @link https://bitbucket.org/dlu/dlutwbootstrap
 */

return array(
    'view_manager' => array(
        'layout'                    => 'layout/layouttwb',
    ),
);