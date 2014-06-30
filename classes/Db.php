<?php

require_once 'config.php';

class Db {

    public $connection = null;
    public static $instance = null;
    public static $dsn;
    public static $username;
    public static $password;

    private function __construct() {
        try {
            //create a new PDO connection
            $this->connection = new PDO(self::$dsn, self::$username, self::$password);
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

    public static function setCredentials($dbServer, $database, $username, $password) {

        self::$dsn = "mysql:host=" . $dbServer . ";dbname=" . $database;
        self::$username = $username;
        self::$password = $password;
    }

    // executes a query 
    public function query($statement, $params) {
        
        $stmt = $this->connection->prepare($statement);    //prepare statement
        $stmt->execute($params);    //execute query        
        $result = $stmt->fetch();   //fetch result 
        $rowCount = $stmt->rowCount();
        return strstr($statement, 'insert')?$rowCount: $result;   //return result
      
    }

    //closes database connection
    public function __destruct() {
        $this->connection = null;
    }

}

