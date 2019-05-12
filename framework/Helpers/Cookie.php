<?php
namespace Framework\Helpers;

/**
 * Cookie helper
 */
class Cookie
{
    /**
     * @param string $key
     * @param string $value
     * @param int $time
     */
    public static function set(string $key, string $value, int $time = 31536000){
		setcookie($key, $value, time() + $time, '/');
	}

    /**
     * @param string $key
     * @return mixed|null
     */
    public static function get(string $key){
		return isset($_COOKIE[$key]) ? $_COOKIE[$key] : NULL;
	}

    /**
     * @param string $key
     */
    public static function delete(string $key){
		if( isset($_COOKIE[$key]) ){
			self::set($key, '', -3600);
			unset($_COOKIE[$key]);
		}
	}
}