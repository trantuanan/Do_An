<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

class Bills extends Model
{
    protected $table = 'bills';
    protected $fillable = [
        'customer_id', 'trangthai', 'tiendo', 'mota', 'thanhtien', 'ngayht', 'thue', 'address','phone', 'ngaytra', 'madh'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function getList(array $request)
    {
        $builder = Bills::orderBy('tiendo', 'ASC')->orderBy('created_at', 'DESC')
        ->leftJoin('customers', 'customers.id', '=', 'bills.customer_id')
        ->select('bills.*', 'customers.name as tenkh');
        if (isset($request['search'])) {
            $builder->where('customers.name', 'LIKE', '%' . $request['search'] . '%');
        }
        if (isset($request['loai'])) {
            $builder->where('bills.tiendo', $request['loai']);
        }
        return $builder->paginate(10);
    }

    public function getListBillSX()
    {
        $builder = Bills::orderBy('tiendo', 'ASC')
        ->leftJoin('customers', 'customers.id', '=', 'bills.customer_id')
        ->select('bills.*', 'customers.name as tenkh')
        ->where('bills.tiendo', '=', 2);
        return $builder->get();
    }

    public function createBill(array $request)
    {
        $last = Bills::orderBy('madh', 'desc')->first();
        if (isset($last)) {
            $madh = $last->madh;
            $madh++;
            $request['madh'] = $madh;
        } else {
            $request['madh'] = 'DH001';
        }
        return Bills::create($request);
    }

    public function getBill($id)
    {
        $builder = Bills::where('bills.id', $id)
        ->leftJoin('customers', 'customers.id', '=', 'bills.customer_id')
        ->select('bills.*', 'customers.name as tenkh');
        return $builder->get();
    }

    public function updateBill(array $request)
    {        
        $input = [ 
            'customer_id' => $request['customer_id'],
            'trangthai' => $request['trangthai'],
            'tiendo' => $request['tiendo'],
            'mota' => $request['mota'],
            'ngayht' => $request['ngayht'],
            'ngaytra' => $request['ngaytra'],
            'thanhtien' => $request['thanhtien'],
            'address' => $request['address'],
            'phone' => $request['phone'],
            'thue' => $request['thue'],
            'updated_at' => Carbon::now(),
        ];
        $builder = Bills::where('id', $request['id'])->update($input);
    }

    public function deleteBill($id)
    {
        return Bills::where('id', $id)->delete();
    }

    public function duyetBill(array $request)
    {
        return Bills::where('id', $request['id'])->update(['tiendo' => $request['tiendo']]);
    }

    public function getListBillCustomer(array $request)
    {
        $builder = Bills::orderBy('tiendo', 'ASC')
        ->where('customer_id', $request['id']);
        return $builder->paginate(10);
    }

    public function getTKDH()
    {
        $builder = Bills::orderBy('ngayht', 'ASC')
        ->select( DB::Raw('COUNT(bills.id) as donhang'), 'ngayht')
        ->where('bills.tiendo',5)
        ->groupBy('bills.ngayht')
        ->limit(7);
        return $builder->get();
    }
}
