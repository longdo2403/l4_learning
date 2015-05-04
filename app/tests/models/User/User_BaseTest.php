<?php

/**
 * User_BaseTest
 * This class will truncate and create data for User Model
 * 
 * @author Long Do
 *
 */
class User_BaseTest extends TestCase {
    protected $table = 'dtb_user';

    public function setUp(){
        parent::setUp();
        $this->setUpUserList();
    }

    public function tearDown(){
        parent::tearDown();
        $this->setUpUserList();
    }

    /**
     * Truncate and Create Data for User Table
     */
    public function setUpUserList(){
        $arrUsers = array(
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
        //delete all record in dtb_user
        User::truncate();
        //Insert dummy data
        foreach ($arrUsers as $user){
            DB::table($this->table)->insert($user);
        }
    }
}
