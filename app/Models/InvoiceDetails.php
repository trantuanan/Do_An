<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

class InvoiceDetails extends Model
{
    protected $table = 'invoices_details';
    protected $fillable = [
        'invoices_id', 'product_id', 'soluong', 'dongia'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function getInvoiceDetails($id)
    {
        $builder = DB::table('invoices_details')
        ->Join('invoices', 'invoices.id', '=', 'invoices_details.invoices_id')->where('invoices.id',$id)
        ->Join('products', 'products.id', '=', 'invoices_details.product_id')
        ->select('invoices_details.*', 'products.name', 'products.anh', 'products.size', 'products.vatlieu' );
        return $builder->get();
    }
}
