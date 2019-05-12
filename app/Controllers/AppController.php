<?php

namespace App\Controllers;

use Framework\Core\Controller;

/**
 * Class AppController
 * @package App\Controllers
 */
class AppController extends Controller
{
    /**
     * AppController constructor.
     * @param $di
     */
    public function __construct($di){
		parent::__construct($di);
	}
}