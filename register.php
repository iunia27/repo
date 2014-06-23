<?

require_once 'Autoloader.php';

if ($_POST['submit']) {
    //if the user submitted the form
    $register = new Register();
    $validation = $register->validateFields($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password'], $_POST['confirmpassword']);

    if ($validation == true) {    //if all the fields are filled in correctly
        $registration = $register->userRegistration($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password']); //register user
        if ($registration != false){
        header('Location: index.php');    //redirect the user to the index page
        exit();
        }
        echo 'Could not register';
    }
    echo 'Could not register.';
} else {
    echo 'All fields are mandatory!';
}
require_once 'registrationForm.html';
