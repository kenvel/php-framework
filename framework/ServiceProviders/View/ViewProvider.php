<?php

namespace Framework\ServiceProviders\View;

use Framework\ServiceProviders\Provider;
use Framework\Core\View;

class ViewProvider extends Provider
{
	private $service_name = 'view';

	/**
	 * Initialization
	 * @return mixed|void
	 */
    public function init(){
        $provider_value = new View();
        $this->di->set($this->service_name, $provider_value);
    }
}