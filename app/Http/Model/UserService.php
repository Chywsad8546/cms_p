<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class UserService extends Model
{
    public function userRegister($params){
        $query =  DB::table('user');
        $query->where('user_name', '=', $params['user_name']);
        $query->where('phone', '=', $params['phone']);
        $count = $query->count();
        if ($count>0){
            return 0;
        }else{
            $id = DB::table('user')->insertGetId([
                'user_name' => $params['user_name'],
                'create_time' => date('Y-m-d H:i:s'),
                'password' => $params['password'],
                'phone' => $params['phone'],
            ]);
        }
        return $id;
    }
}