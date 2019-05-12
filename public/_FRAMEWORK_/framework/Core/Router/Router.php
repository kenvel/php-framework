<?php

namespace Framework\Core\Router;


class Router
{
    /**
     * Routes
     */
	private $routes = [];

    /**
     * Host
     */
	private $host;

    /**
     * Dispatcher
     */
    private $dispatcher;


    /**
     * Router constructor.
     * @param $host
     */
    public function __construct($host){
		$this->host = $host;
	}

    /**
     * Adding routes
     * @param string $key
     * @param string $pattern
     * @param string $controller
     * @param string $method
     */
    public function add(string $key, string $pattern, string $controller, string $method = 'GET'){
		$this->routes[$key] = [
			'pattern' 		=> $pattern,
			'controller' 	=> $controller,
			'method' 		=> $method,
		];
	}

	/**
	 * Get dispatcher for method
	 * @param  string $method 
	 * @param  string $uri    
	 * @return $this->getDispatcher()        
	 */
	public function dispatch(string $method, string $uri){
		return $this->createDispatcher()->dispatch($method, $uri);
	}

    /**
     * Create dispatcher
     * @return UrlDispatcher
     */
    private function createDispatcher(){

		if($this->dispatcher == NULL){

			$this->dispatcher = new UrlDispatcher();

			foreach ($this->routes as $route) {

				$this->dispatcher->register(
					$route['method'],
					$route['pattern'],
					$route['controller']
				);

			}
		}

		return $this->dispatcher;
	}
}