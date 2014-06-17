<?php
require_once 'Autoloader.php';

session_start();

$user = new User();    //create a new user
if ($user->getSession() == null) {    //if there is an active session
    header('Location: index.php');    //redirect the user
    exit;
}
echo 'Hello, ' . $_SESSION['name'] . "!";
?>

<div align='right'>
    <a href='logout.php' title='Logout' >Logout</a>
</div>


