<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Yeucauxuatnhap extends Model
{
    protected $table = 'yeucauxuatnhap';
    protected $fillable = [
        'khohang_id', 'users_id', 'loaiphieu', 'ngaylay', 'thanhtien', 'trangthai', 'mota', 'mayc'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function getList(array $request)
    {
        $builder = Yeucauxuatnhap::orderBy('trangthai', 'ASC')->orderBy('created_at', 'DESC')
        ->leftJoin('khohang', 'khohang.id', '=', 'yeucauxuatnhap.khohang_id')
        ->leftJoin('users', 'users.id', '=', 'yeucauxuatnhap.users_id')
        ->select('yeucauxuatnhap.*', 'khohang.name as tenkho', 'users.name as ngtao');
        if (isset($request['search'])) {
            $builder->where('users.name', 'LIKE', '%' . $request['search'] . '%');
        }
        return $builder->paginate(10);
    }

    public function createYCXN(array $request)
    {
        $last = Yeucauxuatnhap::orderBy('mayc', 'desc')->first();
        if (isset($last)) {
	        $mayc = $last->mayc;
	        $mayc++;
	        $request['mayc'] = $mayc;
        } else {
        	$request['mayc'] = 'YCXN001';
        }
        return Yeucauxuatnhap::create($request);
    }

    public function geYCXN($id)
    {
        $builder = Yeucauxuatnhap::where('yeucauxuatnhap.id', $id)
        ->leftJoin('users', 'users.id', '=', 'yeucauxuatnhap.users_id')
        ->select('yeucauxuatnhap.*', 'users.name as ngtao');
        return $builder->get();
    }

    public function deleteYCXN($id)
    {
        $builder = Yeucauxuatnhap::where('id', $id);
        return $builder->delete();
    }
}
