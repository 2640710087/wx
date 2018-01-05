<?php
$basedir = dirname(__FILE__);
//function apiLoader($class) {
//    require_once   $GLOBALS['basedir'] . '/api/' . $class . '.api.php';
//}
function DBLoader($class) {
   require_once $GLOBALS['basedir'] . '/database/' . $class . '.php';
}
//spl_autoload_register('apiLoader', true);
spl_autoload_register('DBLoader', true);


