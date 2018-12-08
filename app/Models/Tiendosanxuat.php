<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tiendosanxuat extends Model
{
    protected $table = 'tiendosanxuat';
    protected $fillable = [
        'ycsx_id', 'product_id', 'design_id', 'soluong', 'conlai', 'ngaybd', 'ngayht', 'tiendo', 'trangthai', 'matdsx'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function getList(array $request)
    {
        $builder = Tiendosanxuat::orderBy('tiendo', 'ASC')->orderBy('created_at', 'DESC')
        ->leftJoin('yeucausanxuat', 'yeucausanxuat.id', '=', 'Tiendosanxuat.ycsx_id')
        ->leftJoin('products', 'products.id', '=', 'Tiendosanxuat.product_id')
        ->leftJoin('designs', 'designs.id', '=', 'Tiendosanxuat.design_id')
        ->select('Tiendosanxuat.*', 'yeucausanxuat.name as tenyc', 'yeucausanxuat.maycsx as maycsx', 'products.name as tensp', 'designs.file as file', 'designs.type as type');
        if (isset($request['search'])) {
            $builder->where('Tiendosanxuat.ycsx_id', 'LIKE', '%' . $request['search'] . '%');
        }
        return $builder->paginate(10);
    }

    public function deleteTDSX($id)
    {
        return Tiendosanxuat::where('id', $id)->delete();
    }

    public function getListTDSX()
    {
        $builder = Tiendosanxuat::orderBy('created_at', 'DESC')
        ->where('Tiendosanxuat.trangthai',1)
        ->where('tiendo',1)
        ->where('conlai','>',0)
        ->leftJoin('products', 'products.id', '=', 'Tiendosanxuat.product_id')
        ->select('Tiendosanxuat.*', 'products.name as tensp');
        return $builder->get();
    }

    public function getListTDSXSL()
    {
        $builder = Tiendosanxuat::orderBy('created_at', 'DESC')
        ->where('Tiendosanxuat.trangthai',1)
        ->where('tiendo',1)
        ->leftJoin('products', 'products.id', '=', 'Tiendosanxuat.product_id')
        ->select('Tiendosanxuat.*', 'products.name as tensp');
        return $builder->get();
    }

    public function addTTSX($id, $soluong)
    {
        return Tiendosanxuat::where('id', $id)->decrement('conlai',$soluong);
    }

    public function addSPL($id, $soluong)
    {
        return Tiendosanxuat::where('id', $id)->increment('conlai',$soluong);
    }

    public function Done($id)
    {
        return Tiendosanxuat::where('id', $id)->update(['tiendo' => 2, 'trangthai' => 2]);
    }

    public function CheckTDSX($ycsx_id)
    {
        return Tiendosanxuat::where('ycsx_id', $ycsx_id)->where('tiendo', 1)->get();
    }

}
