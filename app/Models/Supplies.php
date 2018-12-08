<?php

namespace App\Models;
use Carbon\Carbon;
use DB;

use Illuminate\Database\Eloquent\Model;

class Supplies extends Model
{
    protected $table = 'supplies';
    protected $fillable = [
        'ncc_id', 'name', 'mota', 'mausac', 'thuonghieu', 'dongia', 'loaivt', 'donvi', 'mavt'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function getList(array $request)
    {
        $builder = Supplies::orderBy('name', 'ASC')
        ->leftJoin('nhacungcap', 'nhacungcap.id', '=', 'supplies.ncc_id')
        ->select('supplies.*', 'nhacungcap.name as ncc');
        if (isset($request['search'])) {
            $builder->where('supplies.name', 'LIKE', '%' . $request['search'] . '%');
        }
        return $builder->paginate(10);
    }

    public function createSupplies(array $request)
    {
        $last = Supplies::orderBy('mavt', 'desc')->first();
        if (isset($last)) {
            $mavt = $last->mavt;
            $mavt++;
            $request['mavt'] = $mavt;
        } else {
            $request['mavt'] = 'VT001';
        }
        return Supplies::create($request);
    }

    public function getSupplies($id)
    {
        $builder = Supplies::where('supplies.id', $id)
        ->leftJoin('nhacungcap', 'nhacungcap.id', '=', 'supplies.ncc_id')
        ->select('supplies.*', 'nhacungcap.name as ncc');
        return $builder->get();
    }

    public function updateSupplies(array $request, $id)
    {
        $input = [ 
            'ncc_id' => $request['ncc_id'],
            'name' => $request['name'],
            'mota' => $request['mota'],
            'mausac' => $request['mausac'],
            'thuonghieu' => $request['thuonghieu'],
            'dongia' => $request['dongia'],
            'donvi' => $request['donvi'],
            'loaivt' => $request['loaivt'],
            'updated_at' => Carbon::now(),
        ];
        $builder = Supplies::where('id', $id)->update($input);
    }

    public function deleteSupplies(array $request)
    {
        foreach ($request as $key => $value) {
            $builder = Supplies::whereIn('id', $value)->delete();
        } 
    }

    public function getListSupplies()
    {
        $builder = Supplies::orderBy('name', 'ASC')
        ->leftJoin('nhacungcap', 'nhacungcap.id', '=', 'supplies.ncc_id')
        ->select('supplies.*', 'nhacungcap.name as ncc');
        return $builder->get();
    }

    public function getListSuppliesXK($khohang_id)
    {
        $builder = Supplies::orderBy('name', 'ASC')
        ->RightJoin('phieunhap_details', 'phieunhap_details.supplie_id', '=', 'supplies.id')
        ->Join('phieunhap', 'phieunhap.id', '=', 'phieunhap_details.phieunhap_id')
        ->where('phieunhap.khohang_id',$khohang_id)
        ->leftJoin('nhacungcap', 'nhacungcap.id', '=', 'supplies.ncc_id')
        ->select('supplies.id', 'supplies.name', 'supplies.donvi', 'supplies.dongia', 'supplies.mausac', 'supplies.thuonghieu', 'supplies.loaivt', 'supplies.ncc_id', 'supplies.mota', 'nhacungcap.name as ncc', DB::Raw('SUM(phieunhap_details.soluong) as soluong'))
        ->groupBy('supplies.id', 'supplies.name', 'supplies.donvi', 'supplies.dongia','ncc', 'supplies.mausac', 'supplies.thuonghieu', 'supplies.loaivt', 'supplies.ncc_id', 'supplies.mota');
        return $builder->get();
    }

    public function getListTK(array $request)
    {
        if (isset($request['search'])) {
            $builder = Supplies::select('supplies.*', DB::Raw('soluongnhap(supplies.id) as nhap'), DB::Raw('soluongxuat(supplies.id) as xuat'), DB::Raw('soluongnhap(supplies.id) - soluongxuat(supplies.id) as ton'))
            ->orderBy('ton', 'DESC')
            ->where('supplies.name', 'LIKE', '%' . $request['search'] . '%');
        } elseif (isset($request['khohang_id'])) {
            $builder = Supplies::select('supplies.*', DB::Raw('soluongnhapKho(supplies.id,'.$request['khohang_id'].') as nhap'), DB::Raw('soluongxuatKho(supplies.id,'.$request['khohang_id'].') as xuat'), DB::Raw('soluongnhapKho(supplies.id,'.$request['khohang_id'].') - soluongxuatKho(supplies.id,'.$request['khohang_id'].') as ton'))
            ->orderBy('ton', 'DESC');
        } else {
            $builder = Supplies::select('supplies.*', DB::Raw('soluongnhap(supplies.id) as nhap'), DB::Raw('soluongxuat(supplies.id) as xuat'), DB::Raw('soluongnhap(supplies.id) - soluongxuat(supplies.id) as ton'))
            ->orderBy('ton', 'DESC');
        }
        return $builder->paginate(10);
    }

    public function getListVTTK(array $request)
    {
        if (isset($request['tungay']) && isset($request['denngay'])) {
            // dd($request['tungay']);
            $tungay = date($request['tungay']);
            $denngay = date($request['denngay']);
            $builder = Supplies::select('supplies.*', DB::Raw('soluongnhapBC(supplies.id, "2018-01-01" , DATE_ADD("'.$tungay.'", INTERVAL -1 DAY)) - soluongxuatBC(supplies.id, "2018-01-01" , DATE_ADD("'.$tungay.'", INTERVAL -1 DAY)) as dauky'), DB::Raw('soluongnhapBC(supplies.id, "'.$tungay.'", "'.$denngay.'") as nhap'), DB::Raw('soluongxuatBC(supplies.id, "'.$tungay.'", "'.$denngay.'") as xuat'), DB::Raw('soluongnhapBC(supplies.id, "2018-01-01" , DATE_ADD("'.$tungay.'", INTERVAL -1 DAY)) - soluongxuatBC(supplies.id, "2018-01-01" , DATE_ADD("'.$tungay.'", INTERVAL -1 DAY)) + soluongnhapBC(supplies.id, "'.$tungay.'", "'.$denngay.'") - soluongxuatBC(supplies.id, "'.$tungay.'", "'.$denngay.'") as ton'))
            ->orderBy('ton', 'DESC')
            ->where( DB::Raw('hasPhieunhap(supplies.id)'),'>',0)
            ->orWhere( DB::Raw('hasPhieuxuat(supplies.id)'),'>',0);
        } else {
            $builder = Supplies::select('supplies.*', DB::Raw('soluongnhap(supplies.id) as nhap'), DB::Raw('soluongxuat(supplies.id) as xuat'), DB::Raw('soluongnhap(supplies.id) - soluongxuat(supplies.id) as ton'))
            ->orderBy('ton', 'DESC')
            ->where( DB::Raw('hasPhieunhap(supplies.id)'),'>',0)
            ->orWhere( DB::Raw('hasPhieuxuat(supplies.id)'),'>',0);
        }
        return $builder->get();
    }

    
}
