<?php
/**
 * HomeController
 * @author Long Do
 *
 */
class HomeController extends BaseController {
    
    private $rules;
    
    public function __construct(){
        $this->beforeFilter('csrf', array('on'=>'post'));
        $this->setRules();
    }
    
    private function setRules(){
        $this->rules = array(
            'username'    =>  'required',
            'password'    =>  'required'
        );
    }
    
    public function login(){
        if (Request::isMethod('post')){
            $params = Input::all();
            $validator = Validator::make($params, $this->rules);
            if ($validator->fails()) {
                return Redirect::back()
                                ->withInput()
                                ->withErrors($validator);
            } else {
                $ret = UserModel::checkLogin($params);
                if ($ret){
                    return Redirect::back()
                                    ->withInput()
                                    ->with('message', '<p class="alert alert-success">Login OK !</p>');
                } else {
                    return Redirect::back()
                                    ->withInput()
                                    ->with('message', '<p class="alert alert-danger">Login Failed !</p>');;
                }
            }
        }
        return View::make('frontend.pages.users.login');
    }

}
