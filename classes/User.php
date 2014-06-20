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

// Register process
    public function register($firstname, $lastname, $email, $password) {
        $statement = "insert into users(firstname, lastname, email, password) values (:firstname, :lastname, :email, :password)";
        $result = $this->db->query($statement, array(":firstname" => $firstname, ":lastname" => $lastname,":email" => $email, ":password" => sha1($password)));
        return $result;
    }

// Getting name
    public function getName($email, $password) {
        $statement = "select * from users where email = :email";
        $row = $this->db->query($statement, array(":email" => $email));
        return $row['firstname'];
    }

}