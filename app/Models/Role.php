<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Role extends Model
{
    protected $table = 'role';
    protected $fillable = [
        'TenPQ'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function users()
    {
    	return $this->belongsTo(users::class);
    }

    public function getListRole()
    {
        $builder = Role::select();
        return $builder->get();
    }

    public function getRole($id)
    {
        $builder = Role::select()->where('id', $id);
        return $builder->get();
    }

    public function findRole(array $request)
    {
        $builder = Role::orderBy('TenPQ', 'ASC');
        if (isset($request['id'])) {
            $builder->where('id', $request['id']);
        }
        return $builder->get();
    }

    public function changeName(array $request)
    {
        $builder = Role::where('id', $request['id'])
            ->update(['TenPQ' => $request['TenPQ']]);
    }

    public function createRole(array $request)
    {
        return Role::create($request);
    }

    public function updateRole(array $request)
    {
    	$input = [];
    	$role = [];
    	$value = [];
    	$role = $request['quyen'];
    	$value = $request['val'];
    	$input = array_combine($role,$value);
    	$builder = Role::where('id', $request['id'])
        	->update($input);
    }

    public function deleteRole(array $request)
    {
        $builder = Role::where('id', $request['id'])->delete();
    }


}
