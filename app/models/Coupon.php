<?php
class Coupon extends Eloquent {
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_coupon';
    //dont use default timestamp
    public $timestamps = false;
    
    /**
     * Create relation with coupon type table
     */
    public function coupon_type(){
        return $this->hasOne('CouponType', 'id', 'coupon_type_id');
    }
    /**
     * get detail coupon
     * @author Long Do
     * @return integer status coupon
     */
    public static function detailCoupon($coupon){
        $ret = Coupon::with(array('coupon_type'))
        ->where('code', $coupon)
        ->first();
        return $ret;
    }
    
    /**
     * Check valid coupon
     * @author Long Do
     * @param string coupon
     * @return integer status coupon
     */
    public static function checkCoupon($coupon){
        $ret = Coupon::detailCoupon($coupon);
        if (empty($ret)){
            return COUPON_INVALID;
        } else {
            $st_time    =   strtotime($ret->start_date);
            $end_time   =   strtotime($ret->expired_date);
            $cur_time   =   strtotime(date("Y-m-d H:i:s"));
            if($st_time < $cur_time && $end_time > $cur_time){
                if ($ret->status == COUPON_UNUSED){
                    return COUPON_UNUSED;
                } else {
                    return COUPON_USED;
                }
            } else {
                return COUPON_EXPIRED;
            }
        }
    }
}