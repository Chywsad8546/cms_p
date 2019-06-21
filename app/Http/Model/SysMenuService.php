<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class SysMenuService extends Model
{
    public function getSysMenuList($params)
    {
        $query = DB::table('sys_menu');
        $params['name'] && $query->where('name', 'like', '%'. $params['name'].'%');
        $params['level'] && $query->where('level', '=', $params['level']);

        if ($params->has('status')) {
            $query->where('status', '=', $params['status']);
        }

        $pageSize=10;
        if ($params->has('pageSize')) {
            $query->paginate($params['pageSize']);
            $pageSize=$params['pageSize'];
        }else{
            $query->paginate($pageSize);
        }


        $query->orderBy('sort', 'ASC');
        //$query->toSql();

        $count = DB::table('sys_menu')->count();

        $res = array(
            'list'=>$query->get(),
            "pagination"=>array('total'=>$count,
                "pageSize"=>$pageSize
            )
            /*'1'=>array('logInfo'=>$loginInfo),*/
        );
        return json_encode($res,JSON_UNESCAPED_UNICODE);
    }

    public function addSysMenu($params){
      /*  $addArray = array();
        $addArray[]= [
            'name' => $params['name'],
            'create_time' => date('Y-m-d H:i:s')
            ];

        if ($params->has('sort')){
            $addArray[]= ['sort' => $params['sort']];
        }

        if ($params->has('level')){
            $addArray[]= ['level' => $params['level']];
        }

        if ($params->has('status')){
            $addArray[]= ['status' => $params['status']];
        }*/

        $id = DB::table('sys_menu')->insertGetId([
            'name' => $params['name'],
            'create_time' => date('Y-m-d H:i:s'),
            'sort' => $params['sort'],
            'level' => $params['level'],
            'status' => $params['status'],
        ]);
        return $id;
    }

}
