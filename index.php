<?php

require_once 'Autoloader.php';

if ((!empty($_POST['email'])) && (!empty($_POST['password']))) {
    //if the user filled in the e-mail and password fields
    $login = new Login();
    $login->authenticate($_POST['email'], $_POST['password']); //create a new login

    if (isset($_SESSION['login'])) {    //if the login process was successful
        header('Location: secretPage.php');    //redirect the user to the secret page
        exit();
    }
    echo 'Could not log in.';
}

require_once 'form.html';
