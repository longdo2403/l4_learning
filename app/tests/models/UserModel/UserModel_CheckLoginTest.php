<?php

/**
 * @author Long Do
 * @TODO
 * 
 * 
 */
class UserModel_CheckLoginTest extends UserModel_BaseTest {

    public function setUp(){
        parent::setUp();
    }
    
    public function testCheckLoginReturnTrueCase(){
        $arrData = array(
            'username'  =>  'admin',
            'password'  =>  '123456'
        );
        $this->actual = UserModel::checkLogin($arrData);
        $this->expected = TRUE;
        $this->verify();
    }
    
    public function tearDown(){
        parent::tearDown();
    }
}
