<?php
namespace Framework\Helpers;

/**
 * Http helper
 */
class Http
{	
	/**
	 * detect POST method
	 * @return boolean
	 */
	static function isPost(){
		return (bool) $_SERVER['REQUEST_METHOD'] === 'POST';
	}

	/**
	 * Get request method
	 * @return [type] [description]
	 */
	static function getMethod(){
		return $_SERVER['REQUEST_METHOD'];
	}

	/**
	 * get URI without GET params
	 * @return string
	 */
	static function getUrl(){
		$uri = $_SERVER['REQUEST_URI'];

		if( $position = strpos($uri, '?') ){
			$uri = substr($uri, 0, $position);
		}

		return $uri;
	}
}