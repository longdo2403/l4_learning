<?php

/**
 * @author Long Do
 * @TODO
 * Test CheckLogin function return Success case
 * Test CheckLogin function return Fail case
 * 
 */
class UserModel_CheckLoginTest extends UserModel_BaseTest {

    public function setUp(){
        parent::setUp();
    }

    public function tearDown(){
        parent::tearDown();
    }

    /**
     * Test function CheckLogin Return Success.
     */
    public function testCheckLoginReturnSuccessCase(){
        $arrData = array(
            'username'  =>  'admin',
            'password'  =>  '123456'
        );
        $this->actual = UserModel::checkLogin($arrData);
        $this->expected = TRUE;
        $this->verify();
    }

    /**
     * Test function CheckLogin Return Fail.
     */
    public function testCheckLoginReturnFailCase(){
        $arrData = array(
            'username'  =>  'admin',
            'password'  =>  '123456789'
        );
        $this->actual = UserModel::checkLogin($arrData);
        $this->expected = FALSE;
        $this->verify();
    }
}
