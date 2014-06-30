<?php
require_once 'classes/Register.php';
require_once 'classes/User.php';
require_once 'classes/Db.php';

class RegisterTest extends PHPUnit_Framework_TestCase {

    protected $register;

    protected function setUp() {

        $this->register = new Register();
        $class = get_class($this->register);
        $this->assertEquals($class, "Register");
    }

    public function testValidateFields() {
        $resultF1 = $this->register->validateFields(null, null, null, null, null);
        $this->assertFalse($resultF1);
        $resultF2 = $this->register->validateFields(' ', ' ', ' ', ' ', ' ');
        $this->assertFalse($resultF2);
        $resultF3 = $this->register->validateFields('123', '123', 'aaa@aaa.com', '12345', '12345');
        $this->assertFalse($resultF3);
        $resultF4 = $this->register->validateFields('aaaaa', 'aaaa', 'aaa234sad34', '12345', '12345');
        $this->assertFalse($resultF4);
        $resultF5 = $this->register->validateFields('aaaaa', 'aaaa', 'aaa@aaa.com', '12345', '123456');
        $this->assertFalse($resultF5);
        $resultT = $this->register->validateFields('iunia', 'bujita', 'iunia.bujita@softvision.ro', '12345', '12345');
        $this->assertTrue($resultT);
    }

    public function testUserRegistration() {
        $this->assertFalse($this->register->userRegistration(null, null, null, null));
        $this->assertTrue($this->register->userRegistration('test', 'user', 'test.user@softvision.ro', 12345));
    }

}
