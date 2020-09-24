<?php

spl_autoload_register(function ($class) {

    $file = str_replace('App',INDEX_DIR, $class).'.php';
    $file = str_replace('\\','/', $file) ;

    if (file_exists($file)) {
        require $file;
        return true;
    }
    return false;
});