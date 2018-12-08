<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sanphamloi extends Model
{
    protected $table = 'sanphamloi';
    protected $fillable = [
        'tdsx_id', 'product_id', 'soluong', 'ngaybd', 'ngayht', 'users_id', 'maspl'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function getList(array $request)
    {
        $builder = Sanphamloi::orderBy('created_at', 'DESC')
        ->leftJoin('users', 'users.id', '=', 'sanphamloi.users_id')
        ->leftJoin('products', 'products.id', '=', 'sanphamloi.product_id')
        ->leftJoin('tiendosanxuat', 'tiendosanxuat.id', '=', 'sanphamloi.tdsx_id')
        ->select('sanphamloi.*', 'products.name as tensp', 'products.masp as masp', 'users.name as ngtao', 'tiendosanxuat.matdsx as matdsx');
        if (isset($request['search'])) {
            $builder->where('products.name', 'LIKE', '%' . $request['search'] . '%');
        }
        return $builder->paginate(20);
    }

    public function createSPL(array $request)
    {
        $last = Sanphamloi::orderBy('maspl', 'desc')->first();
        if (isset($last)) {
            $maspl = $last->maspl;
            $maspl++;
            $request['maspl'] = $maspl;
        } else {
            $request['maspl'] = 'SPL001';
        }
        return Sanphamloi::create($request);
    }

    public function deleteSPL($id)
    {
        return Sanphamloi::where('id', $id)->delete();
    }
}
