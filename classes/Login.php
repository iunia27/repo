<?php

session_start();

class Login {

// Login process
    public function __construct() {
        
    }

    public function authenticate($email, $password) {

        $user = new User();    //create a new user
        $login = $user->authenticate($email, $password);    //get the password saved in the db
        if (false !== $login) {
            $_SESSION['name'] = $user->getName($email, $password);
//set the session's name variable as the user's first name
            $_SESSION['login'] = true;    //set the login to true
        }
        return $login!==false;
    }

    // Getting session 
    public function getSession() {
        return $_SESSION['login'];
    }

// Logout 
    public function logout() {
        $_SESSION['login'] = FALSE;    //set the login variable to false
        session_destroy();    //destroy the session
        //setcookie('PHPSESSID', '', time() - 300, '/', '', 0);    //destroy the session cookie
    }

}

?>
