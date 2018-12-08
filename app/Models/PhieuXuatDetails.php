<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhieuXuatDetails extends Model
{
    protected $table = 'phieuxuat_details';
    protected $fillable = [
        'phieuxuat_id', 'supplie_id', 'soluong', 'dongia', 'khohang_id'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function getPhieuXuatDetails($id)
    {
        $builder = PhieuXuatDetails::where('phieuxuat_id',$id)
        ->leftJoin('supplies', 'supplies.id', '=', 'phieuxuat_details.supplie_id')
        ->select('phieuxuat_details.*', 'supplies.name as tenvt');
        return $builder->get();
    }

    public function createPhieuXuatDetails(array $request)
    {
        return PhieuXuatDetails::create($request);
    }

    public function checkPhieuXuatDetails($phieuxuat_id, $supplie_id)
    {
        return PhieuXuatDetails::where('phieuxuat_id', $phieuxuat_id)
        ->where('supplie_id', $supplie_id)->get();
    }

    public function addPhieuXuatDetails($phieuxuat_id, $supplie_id)
    {
        return PhieuXuatDetails::where('phieuxuat_id', $phieuxuat_id)
        ->where('supplie_id', $supplie_id)->increment('soluong');
    }

    public function editSLPhieuXuatDetails($id, $soluong)
    {
        return PhieuXuatDetails::where('id', $id)
        ->update(['soluong'=> $soluong]);
    }

    public function deletePhieuXuatDetails($id)
    {
        return PhieuXuatDetails::where('id', $id)
        ->delete();
    }

    public function getListBCTKPX(array $request)
    {
        $builder = PhieuXuatDetails::orderBy('phieuxuat_id', 'ASC')
        ->leftJoin('supplies', 'supplies.id', '=', 'phieuxuat_details.supplie_id')
        ->leftJoin('phieuxuat', 'phieuxuat.id', '=', 'phieuxuat_details.phieuxuat_id')
        ->leftJoin('khohang', 'khohang.id', '=', 'phieuxuat_details.khohang_id')
        ->select('supplies.name as tenvt', 'supplies.donvi as donvi', 'supplies.mavt as mavt', 'phieuxuat.ngayxuat as ngayxuat', 'phieuxuat.mapx as mapx', 'phieuxuat_details.*', 'khohang.makho as makho');
        if (isset($request['tungay']) || isset($request['denngay'])) {
            $tungay = date($request['tungay']);
            $denngay = date($request['denngay']);
            $builder->whereBetween('phieuxuat.ngayxuat', [$tungay, $denngay]);
        }
        return $builder->get();
    }
}
