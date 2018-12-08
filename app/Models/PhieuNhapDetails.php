<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhieuNhapDetails extends Model
{
    protected $table = 'phieunhap_details';
    protected $fillable = [
        'phieunhap_id', 'supplie_id', 'soluong', 'dongia', 'baohanh', 'khohang_id'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function getPhieuNhapDetails($id)
    {
        $builder = PhieuNhapDetails::where('phieunhap_id',$id)
        ->leftJoin('supplies', 'supplies.id', '=', 'phieunhap_details.supplie_id')
        ->select('phieunhap_details.*', 'supplies.name as tenvt');
        return $builder->get();
    }

    public function createPhieuNhapDetails(array $request)
    {
        return PhieuNhapDetails::create($request);
    }

    public function checkPhieuNhapDetails($phieunhap_id, $supplie_id)
    {
        return PhieuNhapDetails::where('phieunhap_id', $phieunhap_id)
        ->where('supplie_id', $supplie_id)->get();
    }

    public function addPhieuNhapDetails($phieunhap_id, $supplie_id)
    {
        return PhieuNhapDetails::where('phieunhap_id', $phieunhap_id)
        ->where('supplie_id', $supplie_id)->increment('soluong');
    }

    public function editSLPhieuNhapDetails($id, $soluong)
    {
        return PhieuNhapDetails::where('id', $id)
        ->update(['soluong'=> $soluong]);
    }

    public function editBHPhieuNhapDetails($id, $baohanh)
    {
        return PhieuNhapDetails::where('id', $id)
        ->update(['baohanh'=> $baohanh]);
    }

    public function deletePhieuNhapDetails($id)
    {
        return PhieuNhapDetails::where('id', $id)
        ->delete();
    }

    public function getListBCTKPN(array $request)
    {
        $builder = PhieuNhapDetails::orderBy('phieunhap_id', 'ASC')
        ->leftJoin('supplies', 'supplies.id', '=', 'phieunhap_details.supplie_id')
        ->leftJoin('phieunhap', 'phieunhap.id', '=', 'phieunhap_details.phieunhap_id')
        ->leftJoin('khohang', 'khohang.id', '=', 'phieunhap_details.khohang_id')
        ->select('supplies.name as tenvt', 'supplies.donvi as donvi', 'supplies.mavt as mavt', 'phieunhap.ngaynhap as ngaynhap', 'phieunhap.mapn as mapn', 'phieunhap_details.*', 'khohang.makho as makho');
        if (isset($request['tungay']) || isset($request['denngay'])) {
            $tungay = date($request['tungay']);
            $denngay = date($request['denngay']);
            $builder->whereBetween('phieunhap.ngaynhap', [$tungay, $denngay]);
        }
        return $builder->get();
    }
}
