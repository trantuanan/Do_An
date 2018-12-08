<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    protected $table = 'reports';
    protected $fillable = [
        'name', 'mail_address', 'noidung'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function getList(array $request)
    {
        $builder = Reports::orderBy('created_at', 'DESC');
        if (isset($request['search'])) {
            $builder->where('name', 'LIKE', '%' . $request['search'] . '%');
        }
        return $builder->get();
    }

    public function getMess($mail_address)
    {
        $builder = Reports::orderBy('created_at', 'DESC')->where('mail_address',$mail_address);
        return $builder->get();
    }

    public function deleteReports($id)
    {
        return Reports::where('id', $id)->delete();
    }

    public function createReports(array $request)
    {
        return Reports::create($request);
    }
}
