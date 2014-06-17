<?php

require_once 'Autoloader.php';

$login = new Login();    //create a new login instance
$login->logout();    //log out the user
header('Location: index.php');
