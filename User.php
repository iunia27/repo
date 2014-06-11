<?php

include_once 'DB_class.php';

class User {

// Database connect 
    public function __construct() {
        $db = new DB_Class();
    }

// Login process
 public function login($email, $password) {
        $db = new DB_Class();
        $row = $db->query_user_info($email);
        if ($row != NULL) {
            if (sha1($password) === $row['password']) { //if the passwords match
                header('Location: helloworld.php');
                session_start(); //create a new session
                $_SESSION['login'] = TRUE; //set the login variable to true
                $_SESSION['name'] = $row['firstname']; //set the user's first name in a session variable
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

// Getting name
    public function get_name() {
        return $_SESSION['name'];
    }

// Getting session 
    public function get_session() {
        return $_SESSION['login'];
    }

// Logout 
    public function logout() {
        $_SESSION['login'] = FALSE; //set the login variable to false
        session_destroy(); //destroy the session
        setcookie('PHPSESSID', '', time() - 300, '/', '', 0); //destroy the session cookie
    }

}

?>
