<?php

require_once 'classes/Db.php';

class DbTest extends PHPUnit_Framework_TestCase {

    protected $db;

    protected function setUp() {

        $this->db = new Db();
        $class = get_class($this->db);
        $this->assertEquals($class, "Db");
    }

//    public function testValidateFields() {
//        $resultF1 = $this->register->validateFields(null, null, null, null, null);
//        $this->assertFalse($resultF1);
//        $resultF2 = $this->register->validateFields(' ', ' ', ' ', ' ', ' ');
//        $this->assertFalse($resultF2);
//        $resultF3 = $this->register->validateFields('123', '123', 'aaa@aaa.com', '12345', '12345');
//        $this->assertFalse($resultF3);
//        $resultF4 = $this->register->validateFields('aaaaa', 'aaaa', 'aaa234sad34', '12345', '12345');
//        $this->assertFalse($resultF4);
//        $resultF5 = $this->register->validateFields('aaaaa', 'aaaa', 'aaa@aaa.com', '12345', '123456');
//        $this->assertFalse($resultF5);
//        $resultT = $this->register->validateFields('iunia', 'bujita', 'iunia.bujita@softvision.ro', '12345', '12345');
//        $this->assertTrue($resultT);
//    }
//
//    public function testUserRegistration() {
//        $this->assertFalse($this->register->userRegistration("_!?", 123, 'aaaa2', null));
//        $this->assertEquals($this->register->userRegistration('test', 'user', 'test.user@softvision.ro', 12345), null);
//    }
}