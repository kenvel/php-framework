<?php
return [

	/**
	 * ---------------------------
	 * Host name
	 * ---------------------------
	 */
	'host_name' => 'http://core.loc/',

	/**
	 * ---------------------------
	 * Database connection options
	 * ---------------------------
	 */
	'db_connection' => [
		'db_host' 		=> '127.0.0.1',
		'db_charset' 	=> 'UTF8',
		'db_name' 		=> 'test',
		'db_user' 		=> 'root',
		'db_password' 	=> '',
	],

	/**
	 * ---------------------------
	 * Service providers
	 * ---------------------------
	 */
	'service_providers' => [
		Framework\ServiceProviders\Database\DatabaseProvider::class,
		Framework\ServiceProviders\Router\RouterProvider::class,
		Framework\ServiceProviders\View\ViewProvider::class,
		Framework\ServiceProviders\Request\RequestProvider::class,
	],
];