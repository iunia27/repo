<?php

require_once 'classes/Db.php';
require_once 'classes/User.php';

class UserTest extends PHPUnit_Framework_TestCase {

    protected $user;

    protected function setUp() {

//       $this->db = $this->getMockBuilder('Db')
//                -> setConstructorArgs(array())
//                ->getMock(); //new mock db
        $this->user = new User();
        $class = get_class($this->user);
        $this->assertEquals($class, "User");
        //var_dump($this->user);
//        var_dump($this->db);
    }

    public function testAuthenticate() {

        $resultF1 = $this->user->authenticate(null, null);
        $this->assertFalse($resultF1);
        $resultF2 = $this->user->authenticate('  ', '  ');
        $this->assertFalse($resultF2);
        $resultF3 = $this->user->authenticate('123', '123');
        $this->assertFalse($resultF3);
        $resultT = $this->user->authenticate('iunia.bujita@softvision.ro', '12345');
        $this->assertNotEmpty($resultT);
    }

    public function testRegister() {
        $resultF = $this->user->register(null, null, null, null);
        $this->assertEquals($resultF, 0);
        $resultT = $this->user->register('test', 'user', 'usr@softvision.ro', '12345');
        $this->assertEquals($resultT, 1);
    }

   public function testGetName() {
        
        $this->assertFalse($this->user->userRegistration("_!?", 123, 'aaaa2', null));
        $this->assertEquals($this->user->userRegistration('test', 'user', 'test.user@softvision.ro', 12345), null);
        $this->assertTrue(true);
    }
}
