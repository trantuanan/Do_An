<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Warranty extends Model
{
    protected $table = 'warranty';
    protected $fillable = [
        'invoices_id', 'users_id', 'ngaybh', 'ngaytra', 'lydo', 'phuchi', 'trangthai', 'mabh'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function getList(array $request)
    {
        $builder = Warranty::orderBy('created_at', 'DESC')
        ->leftJoin('users', 'users.id', '=', 'warranty.users_id')
        ->leftJoin('invoices', 'invoices.id', '=', 'warranty.invoices_id')
        ->select('warranty.*', 'users.name as ngtao', 'invoices.mahd as mahd');
        if (isset($request['user_name'])) {
            $builder->where('users.name', 'LIKE', '%' . $request['user_name'] . '%');
        } elseif (isset($request['invoices_id'])) {
        	$builder->where('warranty.invoices_id', 'LIKE', '%' . $request['invoices_id'] . '%');
        }
        return $builder->paginate(10);
    }

    public function createWarranty(array $request)
    {
        $last = Warranty::orderBy('mabh', 'desc')->first();
        if (isset($last)) {
            $mabh = $last->mabh;
            $mabh++;
            $request['mabh'] = $mabh;
        } else {
            $request['mabh'] = 'BH001';
        }
        return Warranty::create($request);
    }

    public function getWarranty($id)
    {
        $builder = Warranty::where('warranty.id', $id)
        ->leftJoin('invoices', 'invoices.id', '=', 'warranty.invoices_id')
        ->leftJoin('users', 'users.id', '=', 'warranty.users_id')
        ->select('warranty.*', 'users.name as ngtao', 'invoices.mahd as mahd');
        return $builder->get();
    }

    public function updateWarranty(array $request)
    {        
        $input = [ 
            'users_id' => $request['users_id'],
            'ngaybh' => $request['ngaybh'],
            'ngaytra' => $request['ngaytra'],
            'lydo' => $request['lydo'],
            'phuchi' => $request['phuchi'],
            'trangthai' => $request['trangthai'],
            'updated_at' => Carbon::now(),
        ];
        $builder = Warranty::where('id', $request['id'])->update($input);
    }

    public function deleteWarranty(array $request)
    {
        foreach ($request as $key => $value) {
            $builder = Warranty::whereIn('id', $value)->delete();
        } 
    }
}
