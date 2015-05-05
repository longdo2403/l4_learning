<?php
/**
 * ProductController
 * @author Long Do
 *
 */
class ProductController extends BaseController {

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
        $this->rules = array();
    }
    
    /**
     * List product page
     * @author Long Do
     */
    public function listProduct(){
        //Return view and pass data to view
        $this->data['title'] = 'List of product';
        $this->data['listProduct'] = Product::listAllProduct();
        return View::make('frontend.pages.product.list')->with($this->data);
    }
    
    /**
     * Add to cart function
     * @author Long Do
     */
    public function addToCart(){
        if (Request::isMethod('post')){
            //get all params from request
            $params = Input::all();
            //Create rule for validate
            $this->rules[Input::get('pro_name')] = 'required|numeric|min:1';
            //create validator object
            $validator = Validator::make($params, $this->rules);
            if ($validator->fails()) {
                //Redirect previous page with validation errors and old input
                return Redirect::back()
                ->withInput()
                ->withErrors($validator);
            } else {
                $objProduct = Product::detailProduct(Input::get('pro_id'));
                if (empty($objProduct)){
                    //Thrown 404 page
                    App::abort(404);
                } else {
                    //Check stock quantity
                    $qty = $params[Input::get('pro_name')];
                    if (Product::checkStock($qty, $objProduct->id)){
                        //Add product to cart
                        Cart::add($objProduct->id, $objProduct->name, $qty,
                                  $objProduct->sale_price);
                        //Redirect to checkout page
                        return Redirect::route('member.checkout');
                    } else {
                        //Thrown message warning
                        $this->message->setType('danger');
                        $this->message->setMess("The number of {$objProduct->name} is not enough to sell.");
                        return Redirect::back()
                                        ->withInput()
                                        ->with('message', $this->message->create());
                    }
                }
            }
        }
    }
}
