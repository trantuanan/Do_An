<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class BillsDetails extends Model
{
    protected $table = 'bills_details';
    protected $fillable = [
        'bill_id', 'product_id', 'soluong', 'dongia', 'design_id'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function getBillDetails($id)
    {
        $builder = DB::table('bills_details')
        ->Join('bills', 'bills.id', '=', 'bills_details.bill_id')->where('bills.id',$id)
        ->Join('products', 'products.id', '=', 'bills_details.product_id')
        ->Join('designs', 'designs.id', '=', 'bills_details.design_id')
        ->select('bills_details.*', 'products.name', 'products.anh', 'products.size', 'products.vatlieu', 'designs.file', 'designs.type'  );
        return $builder->get();
    }

    public function createBillDetails(array $request)
    {
        return BillsDetails::create($request);
    }

    public function checkBillDetails($bill_id, $product_id)
    {
        return BillsDetails::where('bill_id', $bill_id)
        ->where('product_id', $product_id)->get();
    }

    public function addqtyBillDetails($bill_id, $product_id)
    {
        return BillsDetails::where('bill_id', $bill_id)
        ->where('product_id', $product_id)->increment('soluong');
    }

    public function deleteBillDetails($id)
    {
        return BillsDetails::where('id', $id)->delete();
    }

    public function editBillDetails(array $request)
    {
        return BillsDetails::where('id', $request['id'])->update(['soluong' => $request['soluong']]);
    }

    public function editDesign(array $request)
    {
        return BillsDetails::where('id', $request['id'])->update(['design_id' => $request['design_id']]);
    }

}
