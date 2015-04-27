<?php
class UserModel extends Eloquent{
    
    protected $table = 'dtb_user';
    
    public static function UserList(){
        return UserModel::select('id', 'username', 'password')->get();
    }
    
    public static function Detail($id){
        return UserModel::find($id);
    }
    
    public static function checkLogin($arrData){
        $count = UserModel::where('username', $arrData['username'])
                        ->where('password', hash('sha256', $arrData['password']))
                        ->count();
        return (($count == 1) ? true : false);
    }
}