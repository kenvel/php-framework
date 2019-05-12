<?php
namespace Framework\DI;

/**
 * Dependency injection class
 */
class DI
{
    /**
     * Dependency injection container
     * @var array
     */
	private $container = [];

	/**
	 * Setting up container and return instance
	 * @param $key
	 * @param $value
	 * @return $this
	 */
    public function set($key, $value){
    	$this->container[$key] = $value;
    	return $this;
    }

    /**
     * Get container key
     * @param  $key
     * @return mixed
     */
    public function get($key){
        return isset($this->container[$key]) ? $this->container[$key] : NULL;
    }
}