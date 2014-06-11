<?php

include_once 'User.php';
$user = new User(); //create a new user
$user->logout();  //log out the user
header('Location: checklogin.php');
