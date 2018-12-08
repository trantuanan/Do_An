<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Khohang extends Model
{
    protected $table = 'khohang';
    protected $fillable = [
        'name', 'phone', 'address', 'mota', 'makho'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function getList(array $request)
    {
        $builder = Khohang::orderBy('created_at', 'ASC');
        if (isset($request['search'])) {
            $builder->where('name', 'LIKE', '%' . $request['search'] . '%');
        }
        return $builder->paginate(10);
    }

    public function createKhoHang(array $request)
    {
        $last = Khohang::orderBy('makho', 'desc')->first();
        if (isset($last)) {
            $makho = $last->makho;
            $makho++;
            $request['makho'] = $makho;
        } else {
            $request['makho'] = 'KHO01';
        }
        return Khohang::create($request);
    }

    public function getKhoHang($id)
    {
        $builder = Khohang::where('id', $id);
        return $builder->get();
    }

    public function updateKhoHang(array $request, $id)
    {
        $input = [ 
            'name' => $request['name'],
            'mota' => $request['mota'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'updated_at' => Carbon::now(),
        ];
        $builder = Khohang::where('id', $id)->update($input);
    }

    public function deleteKhoHang($id)
    {
        $builder = Khohang::where('id', $id);
        return $builder->delete();
    }

    public function getListKH()
    {
        $builder = Khohang::orderBy('created_at', 'ASC');
        return $builder->get();
    }
}
