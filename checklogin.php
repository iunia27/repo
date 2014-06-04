

<?php
include 'form.html';
include_once 'User.php';

$user = new User(); //create a new user
if(empty($_POST['email']) or empty($_POST['password'])){ //if log in data is incomplete
    $ok = false;
    }else{
    $ok = $user->login($_POST['email'], $_POST['password']); //log in the user   
   }
  if (!$ok){ 
    echo 'Could not log in.';
  } 

