<?php
session_start();
include_once 'User.php';

$user = new User(); //create a new user
if ($user->get_session()) { //if there is an active session
    echo 'Hello, ' . $user->get_name() . "!";
} else {
    header('Location: checklogin.php'); //redirect the user
}
?>

<div align='right'>
    <a href='logout.php' title='Logout' >Logout</a>
</div>


