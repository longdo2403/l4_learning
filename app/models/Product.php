<?php
class Product extends Eloquent {
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_product';
    
    /**
     * Get list of product from database
     * @author Long Do
     * @param array $arrData
     * @return bool
     */
    public static function listAllProduct(){
        return Product::listAll();
    }
}