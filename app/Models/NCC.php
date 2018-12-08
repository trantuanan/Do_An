<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class NCC extends Model
{
    protected $table = 'nhacungcap';
    protected $fillable = [
        'name', 'mail_address', 'mota', 'address', 'phone', 'mancc'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function getList(array $request)
    {
        $builder = NCC::orderBy('name', 'ASC');
        if (isset($request['mail_address'])) {
            $builder->where('mail_address', 'LIKE', '%' . $request['mail_address'] . '%');
        }

        if (isset($request['name'])) {
            $builder->where('name', 'LIKE', '%' . $request['name'] . '%');
        }

        if (isset($request['address'])) {
            $builder->where('address', 'LIKE', '%' . $request['address'] . '%');
        }

        if (isset($request['phone'])) {
            $builder->where('phone',  $request['phone']);
        }
        return $builder->paginate(10);
    }

    public function createNCC(array $request)
    {
        $last = NCC::orderBy('mancc', 'desc')->first();
        if (isset($last)) {
            $mancc = $last->mancc;
            $mancc++;
            $request['mancc'] = $mancc;
        } else {
            $request['mancc'] = 'NCC001';
        }
        return NCC::create($request);
    }

    public function getNCC($id)
    {
        $builder = NCC::where('id', $id);
        return $builder->get();
    }

    public function updateNCC(array $request, $id)
    {
        $input = [ 
            'name' => $request['name'],
            'mota' => $request['mota'],
            'mail_address' => $request['mail_address'],
            'address' => $request['address'],
            'phone' => $request['phone'],
            'updated_at' => Carbon::now(),
        ];
        $builder = NCC::where('id', $id)->update($input);
    }

    public function deleteNCC(array $request)
    {
        foreach ($request as $key => $value) {
            $builder = NCC::whereIn('id', $value)->delete();
        } 
    }

    public function getListNCC(array $request)
    {
        $builder = NCC::orderBy('name', 'ASC');
        if (isset($request['search'])) {
            $builder->where('name', 'LIKE', '%' . $request['search'] . '%');
        }
        return $builder->get();
    }

    public function getListNCC1()
    {
        $builder = NCC::orderBy('name', 'ASC');
        return $builder->get();
    }

}
