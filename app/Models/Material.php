<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Material extends Model
{
    protected $table = 'vatlieu';
    protected $fillable = [
        'product_id', 'supplie_id', 'soluong'
    ];
    public $timestamps = false;

    public function createMaterial(array $request)
    {
        return Material::create($request);
    }

    public function getMaterialProduct($id)
    {
        $builder = Material::where('product_id',$id)
        ->Join('supplies', 'supplies.id', '=', 'vatlieu.supplie_id')
        ->select('vatlieu.*', 'supplies.name as tenvl');
        return $builder->get();
    }

    public function editMaterialProduct(array $request)
    {
        return Material::where('id', $request['id'])->update(['soluong' => $request['soluong']]);
    }

    public function deleteMaterialProduct($id)
    {
        return Material::where('id', $id)->delete();
    }

    public function findMaterialProduct($id)
    {
        $builder = Material::where('product_id',$id);
        return $builder->get();
    }
}
