<?php

// define root
defined('ROOT') or define('ROOT', dirname(__DIR__));

// get controller and action from url
if (isset($_GET['url'])) {
    $url = $_GET['url'];
} else {
    $url = $_SERVER['DOCUMENT_ROOT'] . $_SERVER['REQUEST_URI'];
    $pos = stripos($url, '.php/');

    if ($pos > 0 && $pos != strlen($url) - 5) {
        $url = substr($url, stripos($url, '.php/') + 5);
    } else {
        $url = null;
    }
}

require ROOT . '/library/base.php';
