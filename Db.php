<?php

require_once 'config.php';

class Db {

    public $connection = null;
    public static $instance = null;

    private function __construct() {
        try {
            //create a new PDO connection
            $this->connection = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_DATABASE, DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $e) {
            //catch and throw exception 
            throw $e;
        }
    }

    // returns an instance of Db class
    public static function getInstance() {
    
        if (self::$instance == null) {    //if there is no  instance created
            self::$instance = new self;    //create a new one    
        }
        return self::$instance;    //return the instance
    }

//    public function setCredentials($dbServer, $database, $username, $password) {
//
//        $this->dsn = "mysql:host=" . $dbServer . ";dbname=" . $database;
//      
//        $this->username = $username;
//        $this->password = $password;
//        
//    }
 
    // executes a query 
    public function query($statement, $params) {
        $stmt = $this->connection->prepare($statement);    //prepare statement
        $stmt->execute($params);    //execute query
        $result = $stmt->fetch();   //fetch result 
        return $result;    //return result
    }

    //closes database connection
    public function __destruct() {
        $this->connection = null;
    }

}

