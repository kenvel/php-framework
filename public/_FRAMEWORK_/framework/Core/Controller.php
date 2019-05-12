<?php

namespace Framework\Core;

use \Framework\DI\DI;
use Framework\Core\Auth\Auth;

/**
 * Class Controller
 * @package Framework\Core
 */
abstract class Controller
{
    /**
     * Dependency injections
     */
	protected $di;

    /**
     * view
     */
    protected $view;

    /**
     * Database
     */
    protected $db;

    /**
     * Request array
     */
    protected $request;

    /**
     * Authorization
     */
    protected $auth;


    /**
     * Controller constructor.
     * @param DI $di
     */
    public function __construct(DI $di){
		$this->di       = $di;
		$this->auth     = Auth::check();
		$this->db       = $this->di->get('db');
		$this->view     = $this->di->get('view');
		$this->request  = $this->di->get('request');
	}

    /**
     * @param string $url
     */
    public static function redirect($url = '/'){
	    header( 'Location: ' . $url, TRUE, 301 );
    }
}