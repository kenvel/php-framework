<?php

namespace Framework\ServiceProviders\Request;

use Framework\ServiceProviders\Provider;
use Framework\Core\Request\Request;

class RequestProvider extends Provider
{
    private $service_name = 'request';

    /**
     * Initialization
     * @return mixed|void
     */
    public function init(){
        $this->di->set($this->service_name, new Request());
    }
}