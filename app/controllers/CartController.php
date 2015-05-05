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
            'coupon'      =>  'required',
            'email'       =>  'required|email'
        );
    }
    
    /**
     * Checkout page
     * @author Long Do
     */
    public function checkout(){
        //var_dump(Coupon::listAllCoupon()[0]['relations']['coupon_type']->name);
        $this->data['title'] = 'Checkout';
        $this->data['cartContent'] = Cart::content();
        $this->data['total_price'] = Cart::total();
        if (Request::isMethod('post')){
            if (Input::has('checkCoupon')){
                $params = Input::all();
                //Check coupon function
                unset($this->rules['email']);
                //create validator object
                $validator = Validator::make($params, $this->rules);
                if ($validator->fails()) {
                    //Redirect previous page with validation errors and old input
                    return Redirect::back()
                    ->withInput()
                    ->withErrors($validator);
                } else {
                    $op = Coupon::checkCoupon(Input::get('coupon'));
                    switch ($op){
                        case COUPON_INVALID:
                            $this->message->setType('danger');
                            $this->message->setMess('Coupon does not exist.');
                            break;
                        case COUPON_EXPIRED:
                            $this->message->setType('warning');
                            $this->message->setMess('Coupon has expired.');
                            break;
                        case COUPON_USED:
                            $this->message->setType('warning');
                            $this->message->setMess('Coupon has already used.');
                            break;
                        case COUPON_UNUSED:
                            $this->message->setType('success');
                            $this->message->setMess('Check coupon successfully.');
                            $objCoupon = Coupon::detailCoupon(Input::get('coupon'));
                            $this->data['total_price'] = Cart::total() * (1 - ($objCoupon['relations']['coupon_type']->discount / 100));
                            break;
                    }
                    Session::flash('message_coupon', $this->message->create());
                    return View::make('frontend.pages.cart.checkout')->withInput($params)->with($this->data);
                }
            }
        }
        //Return view and pass data to view
        return View::make('frontend.pages.cart.checkout')->with($this->data);
    }
    
    public function checkCoupon(){
        
    }
    
    public function regOrder(){
        if (Request::isMethod('post')){
            var_dump(Input::all());
        }
    }
}
