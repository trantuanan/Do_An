<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class PhieuNhap extends Model
{
    protected $table = 'phieunhap';
    protected $fillable = [
        'users_id', 'ncc_id', 'khohang_id', 'ngaynhap', 'mota', 'thanhtien', 'mapn'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function getList(array $request)
    {
        $builder = PhieuNhap::orderBy('created_at', 'ASC')
        ->leftJoin('nhacungcap', 'nhacungcap.id', '=', 'phieunhap.ncc_id')
        ->leftJoin('users', 'users.id', '=', 'phieunhap.users_id')
        ->leftJoin('khohang', 'khohang.id', '=', 'phieunhap.khohang_id')
        ->select('phieunhap.*', 'nhacungcap.name as ncc', 'users.name as ngtao', 'khohang.name as tenkho');
        if (isset($request['search'])) {
            $builder->where('phieunhap.id', 'LIKE', '%' . $request['search'] . '%');
        }
        return $builder->paginate(10);
    }

    public function createPhieuNhap(array $request)
    {
        $last = PhieuNhap::orderBy('mapn', 'desc')->first();
        if (isset($last)) {
            $mapn = $last->mapn;
            $mapn++;
            $request['mapn'] = $mapn;
        } else {
            $request['mapn'] = 'PN001';
        }
        return PhieuNhap::create($request);
    }

    public function deletePhieuNhap($id)
    {
        return PhieuNhap::where('id',$id)->delete();
    }

    public function getPhieuNhap($id)
    {
        return PhieuNhap::where('phieunhap.id',$id)
        ->leftJoin('nhacungcap', 'nhacungcap.id', '=', 'phieunhap.ncc_id')
        ->leftJoin('users', 'users.id', '=', 'phieunhap.users_id')
        ->select('phieunhap.*', 'nhacungcap.name as ncc', 'users.name as ngtao')
        ->get();
    }

    public function updatePhieuNhap(array $request,$id)
    {
        $input = [ 
            'users_id' => $request['users_id'],
            'ncc_id' => $request['ncc_id'],
            'khohang_id' => $request['khohang_id'],
            'ngaynhap' => $request['ngaynhap'],
            'mota' => $request['mota'],
            'thanhtien' => $request['thanhtien'],
            'updated_at' => Carbon::now(),
        ];
        $builder = PhieuNhap::where('id', $id)->update($input);
    }


    public function getListTKBCPN(array $request)
    {
        $builder = PhieuNhap::orderBy('created_at', 'ASC')
        ->leftJoin('nhacungcap', 'nhacungcap.id', '=', 'phieunhap.ncc_id')
        ->leftJoin('users', 'users.id', '=', 'phieunhap.users_id')
        ->leftJoin('khohang', 'khohang.id', '=', 'phieunhap.khohang_id')
        ->select('phieunhap.*', 'nhacungcap.name as ncc', 'users.name as ngtao', 'khohang.makho as makho');
        if (isset($request['tungay']) || isset($request['denngay'])) {
            $tungay = date($request['tungay']);
            $denngay = date($request['denngay']);
            $builder->whereBetween('phieunhap.ngaynhap', [$tungay, $denngay]);
        }
        return $builder->get();
    }

}
