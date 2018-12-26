<?php

// error reporting
error_reporting(E_ALL);

// set time zone
date_default_timezone_set('UTC');

// define base location
defined('ROOT') or define('ROOT', dirname(__DIR__));

// check config fits
require ROOT . '/config/config.php';

/**
 * Call Hook
 */
function callHook()
{
	global $url;

	$queryString = array();

	if (isset($url)) {
		$urlArray = array();
		$urlArray = explode('/', $url);
		$controller = $urlArray[0];
		array_shift($urlArray);
		if (isset($urlArray[0])) {
			$action = $urlArray[0];
			array_shift($urlArray);
		}
		$queryString = $urlArray;
	}

	if (empty($controller)) {
		$controller = DEFAULT_CONTROLLER;
	}

	if (empty($action)) {
		$action = 'index';
	}

	$controllerName = ucfirst($controller) . 'Controller';

	$dispatch = new $controllerName($controller, $action);
	$dispatch->beforeAction($queryString);
	$dispatch->$action($queryString);
	$dispatch->afterAction($queryString);
}

/**
 * Class autoloader
 * @param string $className
 */
function __autoload($className)
{
	if (file_exists(ROOT . '/library/' . strtolower($className) . '.php')) {
		require ROOT . '/library/' . strtolower($className) . '.php';
	} elseif (substr($className, -7) === 'Control') {
		require ROOT . '/library/controls/' . strtolower(substr($className, 0, -7)) . '.php';
	} elseif (substr($className, -4) === 'Util') {
		require ROOT . '/library/utils/' . strtolower(substr($className, 0, -4)) . '.php';
	} elseif (substr($className, -10) === 'Controller') {
		require ROOT . '/application/controllers/' . strtolower(substr($className, 0, -10)) . '.php';
	} elseif (substr($className, -5) === 'Model') {
		require ROOT . '/application/models/' . strtolower(substr($className, 0, -5)) . '.php';
	}
}

// start the process
callHook();
