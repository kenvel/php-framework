<?php
namespace Framework\Core\Auth;

/**
 * Class Auth
 * @package Framework\Core\Auth
 */
class Auth implements AuthInterface
{
    /**
     * @return bool
     */
    public static function check(){
        session_start();
		return $_SESSION['user'];
	}

    /**
     * @param $user
     */
    public static function signingIn($user){
        $_SESSION['user'] = $user;
	}

    /**
     * delete session data
     */
    public static function signingOut(){
        unset($_SESSION['user']);
	}

    /**
     * @param $password
     * @return string
     */
    public static function encrypt($password){
		return password_hash($password, PASSWORD_BCRYPT);
	}

    /**
     * @param $password
     * @param $hash
     * @return string
     */
    public static function checkPassword($password, $hash){
		return password_verify($password, $hash);
	}
}