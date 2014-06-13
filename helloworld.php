<?php
session_start();
include_once 'User.php';

$user = new User();    //create a new user
if ($user->getSession()) {    //if there is an active session
    echo 'Hello, ' . $_SESSION['name'] . "!";
} else {
    header('Location: checklogin.php');    //redirect the user
}
?>

<div align='right'>
    <a href='logout.php' title='Logout' >Logout</a>
</div>


