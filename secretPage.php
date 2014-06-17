<?php
session_start();
include_once 'User.php';

$user = new User();    //create a new user
if ($user->getSession() == null) {    //if there is an active session
    header('Location: Index.php');    //redirect the user
    exit;
}
echo 'Hello, ' . $_SESSION['name'] . "!";
?>

<div align='right'>
    <a href='logout.php' title='Logout' >Logout</a>
</div>


