<?php

// Loading libraries and share components
if (file_exists('vendor/autoload.php')) {
        // load via composer
        require_once('vendor/autoload.php');
        $f3 = \Base::instance();
} elseif (!file_exists('lib/base.php')) {
        die('fatfree-core not found. Run `git submodule init` and `git submodule update` or install via composer with `composer install`.');
} else {
        // load via submodule
        /** @var Base $f3 **/
        $f3=require('lib/base.php');
        //$f3=require('vendor/bcosca/fatfree-core/base.php');
}

// Verifing PHP version
$f3->set('DEBUG',1);
if ((float)PCRE_VERSION<8.0)
        trigger_error('PCRE version is out of date');

$f3->config('config/config.ini');
$f3->config('config/routes.ini');
//$f3->set('ONERROR', 'LoginController->error');

new Session();

$f3->run();

?>
