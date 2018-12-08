<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cache;
use Auth;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'name', 'mail_address', 'password', 'address', 'phone', 'role', 'ngaysinh', 'cmnd', 'gioitinh', 'anh'
    ];
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    public function Role()
    {
        return $this->hasMany(Role::class);
    }

    public function isOnline()
    {
        return Cache::get('users-online-'.$this->id);
    }

    public function getList(array $request)
    {
        $builder = User::orderBy('mail_address', 'ASC');
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

    public function createUser(array $request)
    {
        if (isset($request['anh'])) {
            $request['anh'] = $request['anh']->getClientOriginalName();
        } else {
            $request['anh'] = 'default_avatar.jpg';
        }
        $request['password'] = bcrypt($request['password']);
        return User::create($request);
    }

    public function deleteUser(array $request)
    {
        foreach ($request as $key => $value) {
            $builder = User::whereIn('id', $value)->delete();
        } 
    }

    public function getUser($id)
    {
        $builder = User::where('users.id', $id)
        ->leftJoin('role', 'role.id', '=', 'users.role_id')
        ->select('users.*', 'role.TenPQ as TenPQ')->get();
        return $builder;
    }

       public function updateUser(array $request)
    {
        if (isset($request['anh_1'])) {
            $request['anh'] = $request['anh_1']->getClientOriginalName();
        } 

        if ($request['password_1'] != '') {
            $request['password'] = bcrypt($request['password_1']);
        } 
        
        $input = [ 
            'mail_address' => $request['mail_address'],
            'password' => $request['password'],
            'name' => $request['name'],
            'address' => $request['address'],
            'phone' => $request['phone'],
            'role_id' => $request['role_id'],
            'ngaysinh' => $request['ngaysinh'],
            'cmnd' => $request['cmnd'],
            'gioitinh' => $request['gioitinh'],
            'anh' => $request['anh']
        ];

        $builder = User::where('id', $request['id']);
        return $builder->update($input);
    }

    public function updateProfile(array $request)
    {
        $request['password'] = bcrypt($request['password']);
        $builder = User::where('id', $request['id']);
        return $builder->update(['password' => $request['password']]);
    }

    public function getListUser()
    {
        $builder = User::orderBy('created_at', 'ASC')
        ->select('name', 'anh', 'id');
        return $builder->get();
    }

}
