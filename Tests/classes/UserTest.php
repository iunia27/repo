<?php

require_once 'classes/User.php';
require_once 'classes/Db.php';

class UserTest extends PHPUnit_Framework_TestCase {

    protected $user;

    protected function setUp() {

        $this->user = new User();  //create a new user
        $class = get_class($this->user);
        $this->assertEquals($class, "User");
    }

    public function testAuthenticate() {
        //tests for incorrect authentication credentials
        $resultF1 = $this->user->authenticate(null, null);
        $this->assertFalse($resultF1);
        $resultF3 = $this->user->authenticate('123', '123');
        $this->assertFalse($resultF3);
        $resultF4 = $this->user->authenticate('abcdf', 'aaaa');
        $this->assertFalse($resultF4);
        //test for correct authentication credentials
        $resultT = $this->user->authenticate('iunia.bujita@softvision.ro', '12345');
        $this->assertNotEmpty($resultT);
    }

    public function testRegister() {
        //try to register with null values
        $this->assertFalse($this->user->register(null, null, null, null));
        //try to register with correct values
        $this->assertTrue($this->user->register('test', 'user', 'test.user@softvision.ro', 12345));
    }

    public function testGetName() {
        //try to get the name of an inexistent user
        $this->assertNull($this->user->getName('dassda', 'dsasdasdasdf'));
        //try to get the name of an existent user
        $this->assertEquals($this->user->getName('iunia.bujita@softvision.ro', '12345'), 'iunia');
    }

}
