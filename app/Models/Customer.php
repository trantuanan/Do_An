<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable = [
        'name', 'mail_address', 'password', 'address', 'phone', 'ngaysinh', 'gioitinh', 'makh'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function createCustomer(array $request)
    {
        $request['password'] = bcrypt($request['password']);
        $last = Customer::orderBy('makh', 'desc')->first();
        if (isset($last)) {
            $makh = $last->makh;
            $makh++;
            $request['makh'] = $makh;
        } else {
            $request['makh'] = 'KH001';
        }
        return Customer::create($request);
    }

    public function changCustomer(array $request)
    {
        $request['password'] = bcrypt($request['password']);
        $builder = Customer::where('id', $request['id']);
        return $builder->update(['password' => $request['password']]);
    }

    public function getList(array $request)
    {
        $builder = Customer::orderBy('mail_address', 'ASC');
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

    public function getCustomer($id)
    {
        $last = Customer::orderBy('makh', 'desc')->first();
        if (isset($last)) {
            $makh = $last->makh;
            $makh++;
            $request['makh'] = $makh;
        } else {
            $request['makh'] = 'KH001';
        }
        $builder = Customer::where('id', $id)->get();
        return $builder;
    }

    public function updateCustomer(array $request)
    {
        if ($request['password_1'] != '') {
            $request['password'] = bcrypt($request['password_1']);
        } 
        
        $input = [ 
            'mail_address' => $request['mail_address'],
            'password' => $request['password'],
            'name' => $request['name'],
            'address' => $request['address'],
            'phone' => $request['phone'],
            'ngaysinh' => $request['ngaysinh'],
            'gioitinh' => $request['gioitinh']
        ];

        $builder = Customer::where('id', $request['id']);
        return $builder->update($input);
    }

    public function deleteCustomer(array $request)
    {
        foreach ($request as $key => $value) {
            $builder = Customer::whereIn('id', $value)->delete();
        } 
    }

    public function findCustomer(array $request)
    {
        $builder = Customer::orderBy('name', 'ASC');
        if (isset($request['search'])) {
            $builder->where('name', 'LIKE', '%' . $request['search'] . '%');
        }
        return $builder->get();
    }
}
