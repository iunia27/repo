<?php

require_once 'classes/Login.php';
require_once 'classes/User.php';
require_once 'classes/Db.php';

class LoginTest extends PHPUnit_Framework_TestCase {

    protected $login;

    protected function setUp() {

        $this->login = new Login();  //create a new login
        $class = get_class($this->login);
        $this->assertEquals($class, "Login");
    }

    public function testAuthenticate() {
        //tests for incorrect authentication credentials
        $resultF = $this->login->authenticate(null, null);
        $this->assertFalse($resultF);
        //tests for correct authentication credentials
        $resultT = $this->login->authenticate('iunia.bujita@softvision.ro', 'dummypass');
        $this->assertTrue($resultT);
        $this->assertTrue($_SESSION['login']);
    }

    public function testGetSession() {
        //create an empty session array and test the getSession() function 
        $_SESSION = array();
        $this->assertEquals($this->login->getSession(), null);
        //create a session array with the name element and test the getSession() function 
        $_SESSION = array('name' => 'iunia');
        $this->assertEquals($this->login->getSession(), null);
        //create a session array with the login element and test the getSession() function 
        $_SESSION = array('login' => true);
        $this->assertTrue($this->login->getSession());
    }

    public function testLogout() {
        //test log out
        $this->login->logout();
        $this->assertFalse($_SESSION['login']);
    }

}

?>

