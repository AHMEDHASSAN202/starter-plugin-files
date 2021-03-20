<?php
namespace eCommerce;

spl_autoload_register(function ($class) {
    if (strpos($class, __NAMESPACE__) === false) {
        return;
    }
    $classPath = dirname(E_COMMERCE_PLUGIN_FILE,2) . DIRECTORY_SEPARATOR . $class . '.php';
    require_once $classPath;
});