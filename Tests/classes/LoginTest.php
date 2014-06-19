<?php

//$session_id = "abracadabra";
require_once 'classes/Login.php';
require_once 'classes/User.php';
require_once 'classes/Db.php';

class LoginTest extends PHPUnit_Framework_TestCase {

    protected $login;
    public $session_id;

    protected function setUp() {

        $this->login = new Login();
        $class = get_class($this->login);
        $this->assertEquals($class, "Login");
    }

    public function testAuthenticate() {
        $resultF = $this->login->authenticate(null, null);
        $this->assertFalse($resultF);
        $resultT = $this->login->authenticate('iunia.bujita@softvision.ro', 'dummypass');
        $this->assertTrue($resultT);
        $this->assertTrue($_SESSION['login']);
    }

    public function testGetSession() {
        if (empty($_SESSION)) {
            $this->assertEquals($_SESSION, array());
        }
        if (!(isset($_SESSION['login']))){
            $this->assertArrayNotHasKey('login', $_SESSION);
        }
        $_SESSION = array('login' => true);
        $rez = $this->login->getSession();
    }

    public function testLogout() {
        $this->login->logout();
        $this->assertFalse($_SESSION['login']);
    }
}

?>
