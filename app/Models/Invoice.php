<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Invoice extends Model
{
    protected $table = 'invoices';
    protected $fillable = [
        'customer_id', 'bill_id', 'users_id', 'thanhtien', 'thanhtoan', 'giamtru', 'thue', 'loaitt', 'trangthai', 'mota', 'mahd'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function getList(array $request)
    {
        $builder = Invoice::orderBy('created_at', 'DESC')
        ->leftJoin('users', 'users.id', '=', 'invoices.users_id')
        ->leftJoin('bills', 'bills.id', '=', 'invoices.bill_id')
        ->leftJoin('customers', 'customers.id', '=', 'invoices.customer_id')
        ->select('invoices.*', 'users.name as ngtao', 'customers.name as tenkh', 'bills.madh as madh');
        if (isset($request['search'])) {
            $builder->where('customers.name', 'LIKE', '%' . $request['search'] . '%');
        }
        return $builder->paginate(10);
    }

    public function createInvoice(array $request)
    {
        $last = Invoice::orderBy('mahd', 'desc')->first();
        if (isset($last)) {
            $mahd = $last->mahd;
            $mahd++;
            $request['mahd'] = $mahd;
        } else {
            $request['mahd'] = 'HD001';
        }
        return Invoice::create($request);
    }

    public function getInvoice($id)
    {
        $builder = Invoice::where('invoices.id', $id)
        ->leftJoin('customers', 'customers.id', '=', 'invoices.customer_id')
        ->leftJoin('users', 'users.id', '=', 'invoices.users_id')
        ->leftJoin('bills', 'bills.id', '=', 'invoices.bill_id')
        ->select('invoices.*', 'customers.name as tenkh', 'users.name as ngtao', 'bills.madh as madh', 'bills.address as diachi', 'bills.phone as sdt');
        return $builder->get();
    }

    public function updateInvoice(array $request)
    {        
        $input = [ 
            'thanhtoan' => $request['thanhtoan'],
            'giamtru' => $request['giamtru'],
            'thue' => $request['thue'],
            'loaitt' => $request['loaitt'],
            'trangthai' => $request['trangthai'],
            'mota' => $request['mota'],
            'updated_at' => Carbon::now(),
        ];
        $builder = Invoice::where('id', $request['id'])->update($input);
    }

    public function deleteInvoice($id)
    {
        return Invoice::where('id', $id)->delete();
    }

    public function getInvoiceComplete()
    {
        $builder = Invoice::orderBy('created_at', 'DESC')
        ->leftJoin('users', 'users.id', '=', 'invoices.users_id')
        ->leftJoin('bills', 'bills.id', '=', 'invoices.bill_id')
        ->leftJoin('customers', 'customers.id', '=', 'invoices.customer_id')
        ->select('invoices.*', 'users.name as ngtao', 'customers.name as tenkh', 'bills.madh as madh')
        ->where('invoices.trangthai', 2);
        return $builder->get();
    }
}
