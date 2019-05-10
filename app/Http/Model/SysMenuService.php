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
        $params['status'] && $query->where('status', '=', $params['status']);
        $query->orderBy('sort', 'ASC');
        //$query->toSql();查看生成的SQL
        return $query->get();
    }
}
