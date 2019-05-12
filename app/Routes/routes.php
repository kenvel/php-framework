<?php
/**
 * Register routes like
 * name - route name
 * path - url path
 * Controller:function - controller name and his function
 * method - GET or POST, default set to GET
 * $this->router->add('name', 'path', 'Controller:function', 'method')
 */

/**
 * Home page
 */
$this->router->add('tasks',     '/',            'TaskController:all');
$this->router->add('task_page', '/(page:int)',  'TaskController:all');

/**
 * Auth
 */
$this->router->add('login', '/login',  'LoginController:login', 'POST');
$this->router->add('logout','/logout', 'LoginController:logout','GET');

/**
 * REST for TASKS
 */
$this->router->add('task_add',    '/add',    'TaskController:add',        'POST');
$this->router->add('task_modify', '/modify', 'TaskAdminController:modify','POST');
$this->router->add('task_delete', '/delete', 'TaskAdminController:delete','POST');
$this->router->add('task_close',  '/close',  'TaskAdminController:close', 'POST');