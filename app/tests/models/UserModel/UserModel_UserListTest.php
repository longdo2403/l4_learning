<?php

/**
 * @author Long Do
 * @TODO
 * Test UserList function return data case when database have data
 * Test UserList function return empty case when database dont have data
 * 
 */
class UserModel_UserListTest extends UserModel_BaseTest {

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
        $this->actual = UserModel::UserList()->toArray();
        $this->expected = array(
            array(
                'id'            =>  '1',
                'username'     =>  'admin',
                'password'      =>  hash('sha256', '123456')
            ),
            array(
                'id'            =>  '2',
                'username'     =>  'admin2',
                'password'      =>  hash('sha256', '123456')
            ),
            array(
                'id'            =>  '3',
                'username'     =>  'admin3',
                'password'      =>  hash('sha256', '123456')
            )
        );
        $this->verify();
    }

    /**
     * Test function UserList Return Empty.
     */
    public function testUserListReturnEmptyCase(){
        UserModel::truncate();
        $this->actual = UserModel::UserList()->toArray();
        $this->expected = array();
        $this->verify();
    }
}
