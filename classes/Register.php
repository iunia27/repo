<?php

class Register {

// Login process
    public function __construct() {
        
    }

//validate names    
    public function validateName($name) {
        if (ctype_alpha(trim($name))) {
            return true;
        }
        return false;
    }

//validate e-mail    
    public function validateEmail($email) {
        if (filter_var(trim($email, FILTER_VALIDATE_EMAIL))) {
            return true;
        }
        return false;
    }

//validate passwords   
    public function validatePasswords($password1, $password2) {
        if (filter_var($password1 == $password2)) {
            return true;
        }
        return false;
    }

    //user register 
    public function userRegistration($firstname, $lastname, $email, $password) {
        $user = new User();    //create a new user
        $register = $user->register($firstname, $lastname, $email, $password);    //register the user
        return $register;
    }

}

