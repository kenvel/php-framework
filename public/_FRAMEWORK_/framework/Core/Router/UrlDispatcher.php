<?php

namespace Framework\Core\Router;

class UrlDispatcher
{
    /**
     * Methods
     * @var [type]
     */
	private $methods = [
                'GET',
                'POST',
                'PUT',
                'PATCH',
                'DELETE',
            ];

    /**
     * Routes
     * @var [type]
     */
    private $routes = [
                'GET' 		=> [],
                'POST' 		=> [],
                'PUT' 		=> [],
                'PATCH' 	=> [],
                'DELETE' 	=> [],
            ];

    /**
     * Patterns for regexps
     * @var [type]
     */
    private $patterns = [
                'int' => '[0-9]+',
                'str' => '[A-z]+',
                'any' => '[A-z0-9]+',
            ];


    /**
     * Get routes by method
     * @param string $method
     * @return array|mixed
     */
    private function getRoutes(string $method){
		return isset( $this->routes[$method] ) ? $this->routes[$method] : [];
	}

	/**
	 * Create dispatcher
	 * @param  string $method [description]
	 * @param  string $uri    [description]
	 * @return [type]         [description]
	 */
	private function createDispatcher(string $method, string $uri){
		foreach ($this->getRoutes($method) as $route => $controller) {
			$pattern = '#^' . $route . '$#s';

			if(preg_match($pattern, $uri, $params)){
				return new DispatchedRoute( $controller, $this->cleanParams($params) );
			}
		}
	}

	/**
	 * Find variables in URL
	 * @param  string $pattern [description]
	 * @return [type]          [description]
	 */
	private function convertPattern(string $pattern){
		if( strpos($pattern, '(') === FALSE ){
			return $pattern;
		}

		$regexp = '#\((\w+):(\w+)\)#';
		$callback = [$this, 'replacePattern'];

		return preg_replace_callback($regexp, $callback, $pattern);
	}

	private function replacePattern($matches){
		return '(?<' . $matches[1] . '>' . strtr($matches[2], $this->patterns) . ')';
	}

	/**
	 * delete trash from params
	 * @param  array  $params
	 * @return $params
	 */
	private function cleanParams(array $params){		
		foreach ($params as $key => $param) {
			if(is_int($key)){
				unset($params[$key]);
			}
		}
		return $params;
	}

	/**
	 * Add patterns
	 * @param string $key
	 * @param string $value
	 */
	public function addPattern(string $key, string $value){
		$this->patterns[$key] = $value;
	}

	/**
	 * Dispatch
	 * @param  string $method [description]
	 * @param  string $uri    [description]
	 * @return DispatchedRoute
	 */
	public function dispatch(string $method, string $uri){
		$routes = $this->getRoutes( strtoupper($method) );

		if( array_key_exists($uri, $routes) ){
			return new DispatchedRoute($routes[$uri]);
		}

		return $this->createDispatcher($method, $uri);
	}

	/**
	 * Register routes
	 * @param  string $method   
	 * @param  string $pattern   
	 * @param  string $controler
	 * @return void
	 */
	public function register(string $method, string $pattern, string $controller){
		$pattern = $this->convertPattern($pattern);

		$this->routes[strtoupper($method)][$pattern] = $controller;
	}
}