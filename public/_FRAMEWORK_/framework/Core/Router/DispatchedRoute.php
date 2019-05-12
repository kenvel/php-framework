<?php

namespace Framework\Core\Router;

class DispatchedRoute
{
    /**
     * Controller
     */
	private $controller;

    /**
     * Parameters
     */
    private $parameters;


    /**
     * DispatchedRoute constructor.
     * @param string $controller
     * @param array $parameters
     */
    public function __construct(string $controller, array $parameters = []){
		$this->controller = $controller;
		$this->parameters = $parameters;
	}

    /**
     * @return string|string
     */
    public function getController(){
		return $this->controller;
	}

    /**
     * @return array
     */
    public function getParameters(){
		return $this->parameters;
	}
}