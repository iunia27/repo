<?php

require_once 'Db.php';

class User {

    public $db = null;

    public function __construct() {
        $this->db = Db::getInstance();
    }

// Login process
    public function getDbPassword($email, $password) {
        $statement = "Select * from users where email = :email";
        $row = $this->db->query($statement, array(":email" => $email));
        return $row['password']; 
    }

// Getting name
    public function getName($email, $password) {
        $statement = "Select * from users where email = :email";
        $row = $this->db->query($statement, array(":email" => $email));
        return $row['firstname']; 
    }

// Getting session 
    public function getSession() {
        return $_SESSION['login'];
    }
}