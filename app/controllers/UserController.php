<?php
/**
 * UserController
 * @author Long Do
 *
 */
class UserController extends BaseController {

    /* Member variables */
    protected $rules;
    protected $message;
    protected $data;

    /**
     * Construct function
     * @author Long Do
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
     * Login page
     * @author Long Do
     */
    public function login(){
        if (Request::isMethod('post')){
            //get all params from request
            $params = Input::all();
            //create validator object
            $validator = Validator::make($params, $this->rules);
            if ($validator->fails()) {
                //Redirect previous page with validation errors and old input
                return Redirect::back()
                                ->withInput()
                                ->withErrors($validator);
            } else {
                $ret = User::checkLogin($params);
                if ($ret){
                    $user = User::where('user_name', Input::get('username'))->first();
                    Auth::login($user);
                    //Redirect to member page with success message
                    return Redirect::route('member.product');
                } else {
                    //Create message
                    $this->message->setType('danger');
                    $this->message->setMess('Your username/password combination was incorrect !');
                    //Redirect previous page with error message
                    return Redirect::back()
                                    ->withInput()
                                    ->with('message', $this->message->create());
                }
            }
        }
        //Return view and pass data to view
        $this->data['title'] = 'Login Form';
        return View::make('frontend.pages.users.login')->with($this->data);
    }

    /**
     * Logout function
     * @author Long Do
     */
    public function logout(){
        
        //Logout account
        Auth::logout();
        //Delete cart
        Cart::destroy();
        //Create message
        $this->message->setType('success');
        $this->message->setMess('Your are now logged out!');
        //Redirect route and pass message
        return Redirect::route('login')->with('message', $this->message->create());
    }
}
