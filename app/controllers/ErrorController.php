<?php
/**
 * ErrorController
 * @author Long Do
 *
 */
class ErrorController extends BaseController {

    /**
     * Require Login Page
     * @author Long Do
     * @return view
     */
    public function login_require(){
        return View::make('frontend.errors.guest');
    }

    /**
     * Need Permission Page
     * @author Long Do
     * @return view
     */
    public function permission(){
        return View::make('frontend.errors.permission');
    }

    /**
     * Thrown 404 Page
     * @author Long Do
     * @return view
     */
    public function page404(){
        return View::make('frontend.errors.404');
    }
}