<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class SysMenu extends Controller
{
    //
    public function getSysMenuList(Request $request)
    {
        $model=new \App\Http\Model\SysMenuService(); //实例化model
        $data = $model -> getSysMenuList($request); //调用model层中方法
      /*  return  json_encode($data,JSON_UNESCAPED_UNICODE);*/
        return  $data;
    }

    public function addSysMenu(Request $request)
    {
        $model=new \App\Http\Model\SysMenuService();
        $data = $model -> addSysMenu($request);
        return $data;
    }

}
