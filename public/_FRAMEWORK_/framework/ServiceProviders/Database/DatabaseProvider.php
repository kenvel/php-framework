<?php

namespace Framework\ServiceProviders\Database;

use Framework\ServiceProviders\Provider;
use Framework\Core\Database\Connection;

class DatabaseProvider extends Provider
{
	private $service_name = 'db';

    /**
     * Initialization
     * @return mixed|void
     */
    public function init(){
    	$config = $this->di->get('config');
    	$db_config = $config['db_connection'];

        $provider_value = new Connection(
    		$db_config['db_host'], 
    		$db_config['db_name'], 
    		$db_config['db_charset'], 
    		$db_config['db_user'], 
    		$db_config['db_password']
    	);

    	$this->di->set($this->service_name, $provider_value);
    }
}