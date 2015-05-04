<?php
/**
 * @author Long Do
 * @TODO
 * Test CheckLogin function return Success case
 * Test CheckLogin function return Fail case
 * 
 */
class User_CheckLoginTest extends User_BaseTest {

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
        $this->actual = User::checkLogin($arrData);
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
        $this->actual = User::checkLogin($arrData);
        $this->expected = FALSE;
        $this->verify();
    }
}
