<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_user';
    //dont use default timestamp
    public $timestamps = false;

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');
    
    /**
     * Check login function
     * @author Long Do
     * @param array $arrData
     * @return bool
     */
    public static function checkLogin($arrData) {
        $userCount = User::where('user_name', $arrData['username'])
        ->where('password', hash('sha256', $arrData['password']))
        ->where('isactive', IS_ACTIVE)
        ->count();
        return (($userCount == 1) ? true : false);
    }
}
