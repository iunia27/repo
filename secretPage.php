<?php
require_once 'Autoloader.php';

//session_start();

$login = new Login();    //create a new user
if ($login->getSession() == null) {    //if there is an active session
    header('Location: index.php');    //redirect the user
    exit;
}
echo 'Hello, ' . $_SESSION['name'] . "!";
?>

<div align='right'>
    <a href='logout.php' title='Logout' >Logout</a>
</div>


