<?php

require_once 'Login.php';
require_once 'form.html';

$login = false;

if ((!empty($_POST['email'])) && (!empty($_POST['password']))) {    
    //if the user filled in the e-mail and password fields
    new Login($_POST['email'], $_POST['password']); //create a new login
    
if ($_SESSION['login'] ) {    //if the login process was successful
    header('Location: helloworld.php');    //redirect the user to the secret page
} else {
    echo 'Could not log in.';
}
}