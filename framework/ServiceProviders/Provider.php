<?php

namespace Framework\ServiceProviders;

use Framework\DI\DI;

abstract class Provider
{
    /**
     * dependency injections container
     */
	protected $di;

	/**
	 * AbstractProvider constructor
	 * @param DI $di
	 */
	public function __construct(DI $di){
		$this->di = $di;
	}

	/**
	 * AbstractProvider initialization
	 * @return mixed
	 */
	abstract function init();
}