<?php
/**
 * CartController
 * @author Long Do
 *
 */
class CartController extends BaseController {

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
     * Checkout page
     * @author Long Do
     */
    public function checkout(){
        $this->data['title'] = 'Checkout';
        $this->data['cartContent'] = Cart::content();
        //Return view and pass data to view
        return View::make('frontend.pages.cart.checkout')->with($this->data);
    }
}
