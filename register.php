<?

require_once 'Autoloader.php';

if ((!empty($_POST['firstname'])) && (!empty($_POST['lastname'])) &&
        (!empty($_POST['email'])) && (!empty($_POST['password'])) &&
        (!empty($_POST['confirmpassword']))) {
    //if the user filled in all the fields
    $register = new Register();
    $firstnameOk = $register->validateName($_POST['firstname']); //validate firstname
    $lastnameOk = $register->validateName($_POST['lastname']); //validate lastname
    $emailOk = $register->validateEmail($_POST['email']); //validate e-mail
    $passwordsOk = $register->validatePasswords($_POST['password'], $_POST['confirmpassword']); //validate passwords

    if ($firstnameOk && $lastnameOk && $emailOk && $passwordsOk) {    //if all the fields are filled in correctly
        $register->userRegistration($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password']); //register user
        header('Location: index.php');    //redirect the user to the index page
        exit();
    }
    echo 'Could not register.';
} else {
    echo 'All fields are mandatory!';
}
require_once 'registrationForm.html';
