<?php

namespace Framework\ServiceProviders\Router;

use Framework\ServiceProviders\Provider;
use Framework\Core\Router\Router;

class RouterProvider extends Provider
{
	private $service_name = 'router';

	/**
	 * Initialization
	 * @return mixed|void
	 */
    public function init(){
        $config = $this->di->get('config');
        $host = $config['host_name'];

        $provider_value = new Router($host);

        $this->di->set($this->service_name, $provider_value);
    }
}