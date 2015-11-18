<?php
//Ini settings
ini_set('display_startup_errors', true);
ini_set('display_errors', true);
error_reporting( E_ALL | E_STRICT );

//ZF2 Path is taken form the ZF2_PATH environment variable
$zf2Path    = getenv('ZF2_PATH');
if (!$zf2Path) {
    throw new \RuntimeException("Test bootstrap: Environment variable 'ZF2_PATH' not found."
                                . ' Set this variable to point to the ZF2 library and run the test again.');
}

//Paths to other modules for which autoloading has to be set up
$otherModulePaths   = array(

);

chdir(dirname(__DIR__));

//ZF2 Autoloader
require_once ($zf2Path . '/Zend/Loader/AutoloaderFactory.php');
Zend\Loader\AutoloaderFactory::factory(array(
                                           'Zend\Loader\StandardAutoloader' => array(
                                               'autoregister_zf' => true
                                           )
                                       ));

/**
 * Configures autoloading as defined in the module
 * Autoloading is configured for the module source
 * as well as for the module tests (if autoload_config_test.php is present)
 * @param string $modulePath
 */
function configureAutoloaderForModule($modulePath) {
    $modulePath = realpath($modulePath);
    $namespace  = basename($modulePath);

    //Autoloader for source of the module
    $moduleFile             = $modulePath . '/Module.php';
    $moduleClass            = $namespace . '\Module';
    require_once($moduleFile);
    $module                 = new $moduleClass();
    $autoloadConfig         = $module->getAutoloaderConfig();
    \Zend\Loader\AutoloaderFactory::factory($autoloadConfig);

    //Autoloader for tests of the module
    $autoloadConfigFile     = $modulePath . '/tests/autoload_config_test.php';
    if(file_exists($autoloadConfigFile)) {
        $autoloadConfig     = require $autoloadConfigFile;
        \Zend\Loader\AutoloaderFactory::factory($autoloadConfig);
    }
}

//Autoloading for this module
$thisModulePath = realpath(__DIR__ . '/../');
configureAutoloaderForModule($thisModulePath);

//Autoloading for other modules
foreach($otherModulePaths as $otherModulePath) {
    configureAutoloaderForModule($otherModulePath);
}

//Unset local vars
unset($zf2Path, $thisModulePath, $otherModulePath, $otherModulePaths);