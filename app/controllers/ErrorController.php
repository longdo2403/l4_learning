<?php
class ErrorController extends HomeController{
    public function __construct(){
        parent::__construct();
    }
    
    public function login_require(){
        return View::make('frontend.errors.guest');
    }
    
    public function permission(){
        return View::make('frontend.errors.permission');
    }
    
    public function page404(){
        return View::make('frontend.errors.404');
    }
}