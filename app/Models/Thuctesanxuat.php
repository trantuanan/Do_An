<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thuctesanxuat extends Model
{
    protected $table = 'thuctesanxuat';
    protected $fillable = [
        'tdsx_id', 'product_id', 'soluong', 'ngaybd', 'ngayht', 'users_id', 'mattsx'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function getList(array $request)
    {
        $builder = Thuctesanxuat::orderBy('created_at', 'DESC')
        ->leftJoin('users', 'users.id', '=', 'thuctesanxuat.users_id')
        ->leftJoin('products', 'products.id', '=', 'thuctesanxuat.product_id')
        ->leftJoin('tiendosanxuat', 'tiendosanxuat.id', '=', 'thuctesanxuat.tdsx_id')
        ->select('thuctesanxuat.*', 'products.name as tensp', 'products.masp as masp', 'users.name as ngtao', 'tiendosanxuat.matdsx as matdsx');
        if (isset($request['search'])) {
            $builder->where('products.name', 'LIKE', '%' . $request['search'] . '%');
        }
        return $builder->paginate(20);
    }

    public function createTTSX(array $request)
    {
        $last = Thuctesanxuat::orderBy('mattsx', 'desc')->first();
        if (isset($last)) {
            $mattsx = $last->mattsx;
            $mattsx++;
            $request['mattsx'] = $mattsx;
        } else {
            $request['mattsx'] = 'TTSX001';
        }
        return Thuctesanxuat::create($request);
    }

    public function deleteTTSX($id)
    {
        return Thuctesanxuat::where('id', $id)->delete();
    }
}
