<?php

require_once 'Db.php';

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_DATABASE', 'test');

Db::setCredentials(DB_SERVER, DB_DATABASE, DB_USERNAME, DB_PASSWORD);
