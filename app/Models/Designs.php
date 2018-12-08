<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Designs extends Model
{
    protected $table = 'designs';
    protected $fillable = [
        'file', 'type', 'size', 'mota', 'matk'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function getList(array $request)
    {
        $builder = Designs::orderBy('file', 'ASC')->orderBy('created_at', 'DESC');
        if (isset($request['search'])) {
            $builder->where('file', 'LIKE', '%' . $request['search'] . '%');
        }
        return $builder->paginate(20);
    }

    public function createDesign(array $request)
    {
        if (isset($request['file'])) {
            $request['file'] = pathinfo($request['file']->getClientOriginalName(), PATHINFO_FILENAME);
        } else {
            $request['file'] = 'default_avatar';
        }
        $last = Designs::orderBy('matk', 'desc')->first();
        if (isset($last)) {
            $matk = $last->matk;
            $matk++;
            $request['matk'] = $matk;
        } else {
            $request['matk'] = 'TK001';
        }
        return Designs::create($request);
    }

    public function getDesign($id)
    {
        $builder = Designs::where('id', $id);
        return $builder->get();
    }

    public function updateDesign(array $request)
    {
        if (isset($request['file_1'])) {
            $request['file'] = pathinfo($request['file_1']->getClientOriginalName(), PATHINFO_FILENAME);
        } 
        
        $input = [ 
            'file' => $request['file'],
            'type' => $request['type'],
            'size' => $request['size'],
            'mota' => $request['mota'],
            'updated_at' => Carbon::now()
        ];
        $builder = Designs::where('id', $request['id'])->update($input);
    }

    public function deleteDesign(array $request)
    {
        foreach ($request as $key => $value) {
            $builder = Designs::whereIn('id', $value)->delete();
        } 
    }

    public function findDesign(array $request)
    {
        $builder = Designs::where('id', $request['id']);
        return $builder->get();
    }

    public function getListDesign(array $request)
    {
        $builder = Designs::orderBy('file', 'ASC')->orderBy('created_at', 'DESC');
        if (isset($request['search'])) {
            $builder->where('file', 'LIKE', '%' . $request['search'] . '%');
        }
        return $builder->get();
    }
}
