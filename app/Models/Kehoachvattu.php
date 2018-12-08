<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kehoachvattu extends Model
{
    protected $table = 'kehoachvattu';
    protected $fillable = [
        'ycsx_id', 'soluong', 'supplie_id', 'trangthai', 'makhvt'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function getList(array $request)
    {
        $builder = Kehoachvattu::orderBy('created_at', 'DESC')
        ->leftJoin('yeucausanxuat', 'yeucausanxuat.id', '=', 'kehoachvattu.ycsx_id')
        ->leftJoin('supplies', 'supplies.id', '=', 'kehoachvattu.supplie_id')
        ->select('kehoachvattu.*', 'yeucausanxuat.name as tenyc', 'yeucausanxuat.maycsx as maycsx', 'supplies.name as tenvt', 'supplies.donvi as donvi');
        if (isset($request['search'])) {
            $builder->where('kehoachvattu.ycsx_id', 'LIKE', '%' . $request['search'] . '%');
        }
        return $builder->paginate(10);
    }

    public function checkKehoachvattu($ycsx_id, $supplie_id)
    {
        return Kehoachvattu::where('ycsx_id', $ycsx_id)
        ->where('supplie_id', $supplie_id)->get();
    }

    public function deleteKHVT($id)
    {
        return Kehoachvattu::where('id', $id)->delete();
    }
}
