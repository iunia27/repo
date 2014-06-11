<?php

define('DB_SERVER', 'localhost:3306');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_DATABASE', 'test');

class DB_Class {

    function __construct() {
        $connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or
                die('Oops connection error -> ' . mysql_error());
        mysql_select_db(DB_DATABASE, $connection)
                or die('Database error -> ' . mysql_error());
    }

    function query_user_info($email) {
        $query = "Select * from users where email='" . trim(addslashes($email)) . "'";
        $result = mysql_query($query) or die('User error ->' . mysql_error());
        $row = null;
        if (!empty($result)) {
            $row = mysql_fetch_array($result) or die('User error ->' . mysql_error());
        }
        return $row;
    }
    
    function __destruct() {
        mysql_close();
    }
}
    ?>

