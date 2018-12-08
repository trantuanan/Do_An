<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

class Yeucausanxuat extends Model
{
    protected $table = 'yeucausanxuat';
    protected $fillable = [
        'name', 'users_id', 'bill_id', 'ngayhen', 'ngaytra', 'trangthai', 'mota', 'maycsx'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function getList(array $request)
    {
        $builder = Yeucausanxuat::orderBy('trangthai', 'ASC')->orderBy('created_at', 'DESC')
        ->leftJoin('users', 'users.id', '=', 'yeucausanxuat.users_id')
        ->leftJoin('bills', 'bills.id', '=', 'yeucausanxuat.bill_id')
        ->select('yeucausanxuat.*', 'users.name as ngtao', 'bills.madh as madh');
        if (isset($request['search'])) {
            $builder->where('yeucausanxuat.name', 'LIKE', '%' . $request['search'] . '%');
        }
        if (isset($request['loai'])) {
            $builder->where('yeucausanxuat.trangthai', $request['loai']);
        }
        return $builder->paginate(10);
    }

    public function createYCSX(array $request)
    {
        $last = Yeucausanxuat::orderBy('maycsx', 'desc')->first();
        if (isset($last)) {
            $maycsx = $last->maycsx;
            $maycsx++;
            $request['maycsx'] = $maycsx;
        } else {
            $request['maycsx'] = 'YCSX001';
        }
        return Yeucausanxuat::create($request);
    }

    public function getYCSX($id)
    {
        $builder = Yeucausanxuat::where('yeucausanxuat.id', $id)
        ->leftJoin('users', 'users.id', '=', 'yeucausanxuat.users_id')
        ->select('yeucausanxuat.*', 'users.name as ngtao');
        return $builder->get();
    }

    public function updateYCSX(array $request, $id)
    {        
        $input = [ 
            'name' => $request['name'],
            'users_id' => $request['users_id'],
            'bill_id' => $request['bill_id'],
            'ngayhen' => $request['ngayhen'],
            'ngaytra' => $request['ngaytra'],
            'trangthai' => $request['trangthai'],
            'mota' => $request['mota'],
            'updated_at' => Carbon::now(),
        ];
        $builder = Yeucausanxuat::where('id', $id)->update($input);
    }

    public function deleteYCSX($id)
    {
        return Yeucausanxuat::where('id', $id)->delete();
    }

    public function editTrangthai(array $request)
    {
        return Yeucausanxuat::where('id', $request['id'])->update(['trangthai' => $request['trangthai']]);
    }

    public function getBillId($id)
    {
        $builder = Yeucausanxuat::where('id', $id)
        ->select('bill_id');
        return $builder->get();
    }
    
}
