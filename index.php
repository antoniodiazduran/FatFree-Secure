<?php

// Kickstart the framework
$f3=require('lib/base.php');

$f3->config('config/config.ini');
$f3->config('config/routes.ini');
$f3->set('ONERROR', 'LoginController->error');

new Session();

$f3->run();

?>
