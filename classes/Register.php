<?php

class Register {

// Login process
    public function __construct() {
        
    }

//validate names    
    public function validateFields($firstname, $lastname, $email, $password1, $password2) {
        $ok = true;
        $message = null;
        if (!(ctype_alpha(trim($firstname)))) {
            $ok = false;
        }
        if (!(ctype_alpha(trim($lastname)))) {
            $ok = false;
        }

        if (!(filter_var(trim($email), FILTER_VALIDATE_EMAIL))) {
            $ok = false;
        }

        if (filter_var($password1 !== $password2)) {
            $ok = false;
        }
        return $ok;
    }

    //user register 
    public function userRegistration($firstname, $lastname, $email, $password) {
        $user = new User();    //create a new user
        $register = $user->register($firstname, $lastname, $email, $password);    //register the user
        return $register;
    }

}

