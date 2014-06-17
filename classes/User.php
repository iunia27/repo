<?php

class User {

    public $db = null;

    public function __construct() {
        $this->db = Db::getInstance();
    }

// Login process
    public function authenticate($email, $password) {
        $statement = "select * from users where email = :email and password = :password";
        $result = $this->db->query($statement, array(":email" => $email, ":password" => sha1($password)));
        return $result;
    }

// Getting name
    public function getName($email, $password) {
        $statement = "select * from users where email = :email";
        $row = $this->db->query($statement, array(":email" => $email));
        return $row['firstname'];
    }

// Getting session 
    public function getSession() {
        return $_SESSION['login'];
    }

}