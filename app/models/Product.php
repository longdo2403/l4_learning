<?php
class Product extends Eloquent {
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_product';
    //dont use default timestamp
    public $timestamps = false;
    
    /**
     * Get list of product from database
     * @author Long Do
     * @return object array
     */
    public static function listAllProduct(){
        return Product::all();
    }

    /**
     * Get exactly product from database by id
     * @author Long Do
     * @param integer product_id
     * @return object
     */
    public static function detailProduct($product_id){
        return Product::where("id", $product_id)->first();
    }
    
    /**
     * check stock of product
     * @author Long Do
     * @param integer quantity from user
     * @param integer quantity from DB
     * @return bool
     */
    public static function checkStock($qty, $qty_db){
        return (($qty > $qty_db) ? false : true);
    }
}