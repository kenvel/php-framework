<?php

namespace App\Controllers;
use Framework\Core\Auth\Auth;

/**
 * Class LoginController
 * @package App\Controllers
 */
class LoginController extends AppController
{
    /**
     *  User log in
     */
    public function login(){
        $this->checkAuth();
        $this::redirect('/');
    }

    /**
     * User log out
     */
    public function logout(){
        Auth::signingOut();
        $this::redirect('/');
    }

    /**
     * Checking auth
     */
    private function checkAuth(){
        if( Auth::check() ) return;

        $post = $this->request->post;

        if( !$post['name'] || !$post['password'] ){
            $this::redirect('/');
        }

        $user = $this->getUser($post);

        if(
            !$user ||
            !$user['role'] === 'admin' ||
            !Auth::checkPassword($post['password'], $user['password'])
        ){
            $this::redirect('/');
        }

        Auth::signingIn($user['name']);
    }

    /**
     * @param $params
     * @return |null
     */
    private function getUser($params){
        $name = $params['name'];
        $user = $this->db->query("SELECT * FROM `users` WHERE name='$name' LIMIT 1");
        if(count($user)){
            return $user[0];
        }
        return NULL;
    }
}