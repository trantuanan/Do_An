<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class PhieuXuat extends Model
{
    protected $table = 'phieuxuat';
    protected $fillable = [
        'users_id', 'khohang_id', 'ngayxuat', 'mota', 'thanhtien', 'nguoinhan', 'mapx'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function getList(array $request)
    {
        $builder = PhieuXuat::orderBy('created_at', 'ASC')
        ->leftJoin('users', 'users.id', '=', 'phieuxuat.users_id')
        ->leftJoin('khohang', 'khohang.id', '=', 'phieuxuat.khohang_id')
        ->select('phieuxuat.*', 'users.name as ngtao', 'khohang.name as tenkho');
        if (isset($request['search'])) {
            $builder->where('phieuxuat.id', 'LIKE', '%' . $request['search'] . '%');
        }
        return $builder->paginate(10);
    }

    public function createPhieuXuat(array $request)
    {
        $last = PhieuXuat::orderBy('mapx', 'desc')->first();
        if (isset($last)) {
            $mapx = $last->mapx;
            $mapx++;
            $request['mapx'] = $mapx;
        } else {
            $request['mapx'] = 'PX001';
        }
        return PhieuXuat::create($request);
    }

    public function deletePhieuXuat($id)
    {
        return PhieuXuat::where('id',$id)->delete();
    }

    public function getPhieuXuat($id)
    {
        return PhieuXuat::where('phieuxuat.id',$id)
        ->leftJoin('users', 'users.id', '=', 'phieuxuat.users_id')
        ->select('phieuxuat.*', 'users.name as ngtao')
        ->get();
    }

    public function updatePhieuXuat(array $request,$id)
    {
        $input = [ 
            'users_id' => $request['users_id'],
            'khohang_id' => $request['khohang_id'],
            'ngayxuat' => $request['ngayxuat'],
            'mota' => $request['mota'],
            'thanhtien' => $request['thanhtien'],
            'nguoinhan' => $request['nguoinhan'],
            'updated_at' => Carbon::now(),
        ];
        $builder = PhieuXuat::where('id', $id)->update($input);
    }

    public function getListTKBCPX(array $request)
    {
        $builder = PhieuXuat::orderBy('created_at', 'ASC')
        ->leftJoin('users', 'users.id', '=', 'phieuxuat.users_id')
        ->leftJoin('khohang', 'khohang.id', '=', 'phieuxuat.khohang_id')
        ->select('phieuxuat.*', 'users.name as ngtao', 'khohang.makho as makho');
        if (isset($request['tungay']) || isset($request['denngay'])) {
            $tungay = date($request['tungay']);
            $denngay = date($request['denngay']);
            $builder->whereBetween('phieuxuat.ngayxuat', [$tungay, $denngay]);
        }
        return $builder->get();
    }

}
