<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    //
    public function userLogin(Request $request)
    {
        $sql = "SELECT COUNT(*) as re from user where phone = ? and password = ?";
        $cusername=DB::select($sql,[$request['userName'],$request['password']]);

       /* $loginInfo  = array(
            '0'=>array('userName'=>$request['userName']),
            '1'=>array('pwd'=>$request['password']),
        );*/


     /*  if ($cusername[0]['re']>0){
           $arr = 'success';
       }else{
           $arr[0] = 'fail';
       }*/


        $arr = array(
            'result'=>$cusername[0]->re
            /*'1'=>array('logInfo'=>$loginInfo),*/
        );
        return  json_encode($arr);
    }


    public function userRegister(Request $request)
    {
        $model=new \App\Http\Model\UserService();
        $data = $model -> userRegister($request);
        return $data;
    }
}
