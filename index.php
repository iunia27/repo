<?php

require_once 'Login.php';
require_once 'form.html';

if ((!empty($_POST['email'])) && (!empty($_POST['password']))) {
    //if the user filled in the e-mail and password fields
    $login = new Login();
    $login->authenticate($_POST['email'], $_POST['password']); //create a new login

    if (isset($_SESSION['login'])) {    //if the login process was successful
        header('Location: helloworld.php');    //redirect the user to the secret page
        exit();
    }
    echo 'Could not log in.';
}