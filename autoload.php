<?php
$basedir = dirname(__FILE__);
//function apiLoader($class) {
//    require_once   $GLOBALS['basedir'] . '/api/' . $class . '.api.php';
//}
function DBLoader($class) {
    if ('Format' == $class) {
        require_once $GLOBALS['basedir'] . '/format/format.php';
    }
    if ('DB' == $class) :
        require_once $GLOBALS['basedir'] . '/database/' . $class . '.php';
    endif;
}
//spl_autoload_register('apiLoader', true);
spl_autoload_register('DBLoader', true);


