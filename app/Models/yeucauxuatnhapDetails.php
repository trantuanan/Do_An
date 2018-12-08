<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class yeucauxuatnhapDetails extends Model
{
	protected $table = 'yeucauxuatnhap_details';
    protected $fillable = [
        'ycxn_id', 'supplie_id', 'khohang_id', 'soluong', 'dongia'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function geListYCXND($id)
    {
        $builder = yeucauxuatnhapDetails::where('ycxn_id', $id)
        ->leftJoin('supplies', 'supplies.id', '=', 'yeucauxuatnhap_details.supplie_id')
        ->select('yeucauxuatnhap_details.*', 'supplies.name as tenvt');
        return $builder->get();
    }


}
