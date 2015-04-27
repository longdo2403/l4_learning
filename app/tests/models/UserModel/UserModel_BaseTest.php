<?php

/**
 * UserModel_BaseTest
 * This class will delete all data then create dummy data for Test
 * 
 * @author Long Do
 *
 */
class UserModel_BaseTest extends TestCase {
    protected $table = 'dtb_user';

    public function setUp(){
        parent::setUp();
        $this->setUpUserList();
    }
    
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
        UserModel::truncate();

        //Insert dummy data
        foreach ($arrUsers as $user){
            DB::table($this->table)->insert($user);
        }
    }
    
    public function testByPassThisClass(){
       //$this->assertTrue(true);
    }
    
    public function tearDown(){
        parent::tearDown();
    }
}
