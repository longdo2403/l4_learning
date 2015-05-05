<?php
/**
 * ProductController
 * @author Long Do
 *
 */
class ProductController extends BaseController {

    /* Member variables */
    private $rules;
    private $message;

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
     * List product page
     * @author Long Do
     */
    public function listProduct(){
        
        return View::make('frontend.pages.product.list');
    }
}
