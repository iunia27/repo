<?php

include_once 'Login.php';

$login = new Login();    //create a new login instance
$login->logout();    //log out the user
header('Location: Index.php');
