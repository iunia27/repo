<?php

require_once 'classes/User.php';
require_once 'classes/Db.php';

class DbTest extends PHPUnit_Framework_TestCase {

    protected $db;

    protected function setUp() {
        //create a mock for the db, disable the original constructor, stub the
        //getInstance and setCredentials functions
        $this->db = $this->getMockBuilder('Db')
                ->setMethods(array('getInstance', 'setCredentials'))
                ->setConstructorArgs(array('getInstance', 'setCredentials'))
                ->disableOriginalConstructor()
                ->getMock();

        $class = get_class($this->db);
        $this->assertStringStartsWith("Mock_Db_", $class);
        //create a new db connection
        $this->db->connection = new PDO("mysql:host=localhost;dbname=test", 'root', 'root');
    }

    public function testQuery() {
        //test the query function for a correct query statement
        $statementT = "select * from users";
        $this->assertNotEmpty($this->db->query($statementT, null));
        //test the query function for an incorrect query statement
        $statementF = "Incorrect Query";
        $this->assertFalse($this->db->query($statementF, null));
    }

    public function test__destruct() {
        //test the destruct function
        $this->db->__destruct();
        $this->assertNull($this->db->connection);
    }

}
