<?php
include_once 'config.php';
class User
{
// Database connect 
public function __construct()
{
$db = new DB_Class();
}

// Login process
public function login($email, $password)
{
$query = "Select * from users where email='".$email."'";
$result = @mysql_query($query);
if (!empty($result)){
  $row = @mysql_fetch_array($result);
  if ($password === $row['password']) { //if the passwords match
    header('Location: http://'. $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']).'/helloworld.php');
    session_start(); //create a new session
    $_SESSION['login'] = TRUE; //set the login variable to true
    $_SESSION['name'] = $row['firstname']; //set the user's first name in a session variable
    return TRUE;
  }
  else
  {
   return FALSE;
  }
}
}
// Getting name
public function get_name()
{
return $_SESSION['name'];
}
// Getting session 
public function get_session()
{
return $_SESSION['login']; 
}
// Logout 
public function logout()
{
$_SESSION['login'] = FALSE; //set the login variable to false
session_destroy(); //destroy the session
setcookie('PHPSESSID', '', time()-300, '/','', 0); //destroy the session cookie
}
}
?>
