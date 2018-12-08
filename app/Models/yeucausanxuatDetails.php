<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class yeucausanxuatDetails extends Model
{
    protected $table = 'yeucausanxuat_details';
    protected $fillable = [
        'design_id', 'product_id', 'ycsx_id', 'soluong'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function getYCSXdetails($id)
    {
        $builder = DB::table('yeucausanxuat_details')
        ->Join('yeucausanxuat', 'yeucausanxuat.id', '=', 'yeucausanxuat_details.ycsx_id')
        ->where('yeucausanxuat.id', $id)
        ->Join('products', 'products.id', '=', 'yeucausanxuat_details.product_id')
        ->Join('designs', 'designs.id', '=', 'yeucausanxuat_details.design_id')
        ->select('yeucausanxuat_details.*', 'products.name', 'products.anh', 'products.size', 'products.vatlieu', 'designs.file', 'designs.type');
        return $builder->get();
    }

    public function createYCSXdetails(array $request)
    {
        return yeucausanxuatDetails::create($request);
    }

    public function checkYCSXdetails($ycsx_id, $product_id)
    {
        return yeucausanxuatDetails::where('ycsx_id', $ycsx_id)
        ->where('product_id', $product_id)->get();
    }

    public function addqtyYCSXdetails($ycsx_id, $product_id)
    {
        return yeucausanxuatDetails::where('ycsx_id', $ycsx_id)
        ->where('product_id', $product_id)->increment('soluong');
    }

    public function editYCSXdetails(array $request)
    {
        return yeucausanxuatDetails::where('id', $request['id'])->update(['soluong' => $request['soluong']]);
    }

    public function deleteYCSXdetails($id)
    {
        return yeucausanxuatDetails::where('id', $id)->delete();
    }

    public function editDesign(array $request)
    {
        return yeucausanxuatDetails::where('id', $request['id'])->update(['design_id' => $request['design_id']]);
    }
}
