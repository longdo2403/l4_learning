<?php
/**
 * HomeController
 * @author Long Do
 *
 */
class HomeController extends BaseController {

    /* Member variables */
    private $rules;
    private $message;

    /**
     * Construct function
     */
    public function __construct(){
        //Filter csrf attack
        $this->beforeFilter('csrf', array('on'=>'post'));
        //Create message object
        $this->message = new MessageHelper();
        //Create rules for validation purpose
        $this->setRules();
    }
    
    /**
     * setRules function
     */
    private function setRules(){
        $this->rules = array(
            'username'    =>  'required',
            'password'    =>  'required'
        );
    }
    
    /**
     * Login function
     */
    public function login(){
        if (Request::isMethod('post')){
            $params = Input::all();
            $validator = Validator::make($params, $this->rules);
            if ($validator->fails()) {
                //Redirect previous page with validation errors
                return Redirect::back()
                                ->withInput()
                                ->withErrors($validator);
            } else {
                $ret = User::checkLogin($params);
                if ($ret){
                    $user = User::where('username', Input::get('username'))->first();
                    Auth::login($user);
                    //create message
                    $this->message->setType('success');
                    $this->message->setMess('Login OK !');
                    //Redirect to member page with success message
                    return Redirect::route('member.index')
                                    ->with('message', $this->message->create());
                } else {
                    //create message
                    $this->message->setType('danger');
                    $this->message->setMess('Login Failed !');
                    //Redirect previous page with error message
                    return Redirect::back()
                                    ->withInput()
                                    ->with('message', $this->message->create());
                }
            }
        }
        return View::make('frontend.pages.users.login');
    }
    
    /**
     * Member function
     */
    public function member(){
        return View::make('frontend.pages.users.index');
    }

}
