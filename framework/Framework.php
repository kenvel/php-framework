<?php
namespace Framework;

use Framework\Helpers\Http;
use Framework\Core\Router\DispatchedRoute;

/**
 * My Framework instance
 */
class Framework
{
    private
    	/**
    	 * Dependency injection
    	 */
    	$di,

        /**
         * Application folder
         */
        $app,

   		/**
   		 * router
   		 */
   		$router;


    /**
     * Framework constructor.
     * @param $di
     * @param string $app
     */
    public function __construct($di, $app = 'app'){
        $this->di = $di;
        $this->app = $app;
        $this->router = $di->get('router');
    }


    /**
     * Running up a Framework
     */
    public function run(){

        try {

            require_once(ABS_PATH . $this->app .'/Routes/routes.php');

            /**
             * Finding up dispatcher
             */
            $dispatcher = $this->router->dispatch( 
                Http::getMethod(), 
                Http::getUrl() 
            );

            /**
             * If dispatcher not found - redirecting to ErrorController
             */
            if($dispatcher == NULL){
                $dispatcher = new DispatchedRoute('ErrorController:page404');
            }

            /**
             * Preparing Controller
             */
            list($controller, $action) = explode(':', $dispatcher->getController(), 2);

            $controller = ucfirst($this->app) .'\\Controllers\\' . $controller;
            $params = $dispatcher->getParameters();

            //$GLOBALS['di'] = $this->di;

            /**
             * Call Controller
             */
            call_user_func_array(
                [new $controller($this->di), $action],
                $params
            );
            
        } catch (\Exception $e) {

            /**
             * Catching an errors
             */
            die($e->getMessage());
        }
    }
}