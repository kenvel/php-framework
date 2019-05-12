<?php
/**
 * include composer autoloader
 */
require_once ABS_PATH . 'vendor/autoload.php';

use Framework\DI\DI;
use Framework\Framework;


try {

	/**
	 * ---------------------------
	 * Dependency injection
	 * ---------------------------
	 */
	$di = new DI();

	/**
	 * ---------------------------
	 * Config init
	 * ---------------------------
	 */
	$config = require ABS_PATH . 'framework/Config/config.php';

	/**
	 * ---------------------------
	 * Reading up config in DI
	 * ---------------------------
	 */
	$di->set('config', $config);

	/**
	 * ---------------------------
	 * Service providers init
	 * ---------------------------
	 */
	$service_providers = $config['service_providers'];

	foreach ($service_providers as $service) {

		$provider = new $service($di);

		$provider->init();
	}

	/**
	 * ---------------------------
	 * Framework
	 * ---------------------------
	 */
	$framework = new Framework($di);

	$framework->run();
	
} catch (\ErrorException $e) {

	/**
	 * ---------------------------
	 * Errors
	 * ---------------------------
	 */
	echo($e->getMessage);
}