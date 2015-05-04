<?php

/**
 * @author Long Do
 * @TODO
 * Test UserList function return data case when database have data
 * Test UserList function return empty case when database dont have data
 * 
 */
class User_UserListTest extends User_BaseTest {

    public function setUp(){
        parent::setUp();
        
        
    }
    public function tearDown(){
        parent::tearDown();
    }

    /**
     * Test function UserList Return Empty.
     */
    public function testUserListReturnDataCase(){
        $this->actual = User::UserList()->toArray();
        $this->expected = array(
            array(
                'id'            =>  1,
                'username'     =>  'admin'
            ),
            array(
                'id'            =>  2,
                'username'     =>  'admin2'
            ),
            array(
                'id'            =>  3,
                'username'     =>  'admin3'
            )
        );
        $this->verify();
    }

    /**
     * Test function UserList Return Empty.
     */
    public function testUserListReturnEmptyCase(){
        User::truncate();
        $this->actual = User::UserList()->toArray();
        $this->expected = array();
        $this->verify();
    }
}