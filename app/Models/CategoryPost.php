<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    protected $table = 'category_posts';
    protected $fillable = [
        'name', 'mota'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function getList()
    {
        $builder = CategoryPost::orderBy('id', 'ASC');
        if (isset($request['search'])) {
            $builder->where('name', 'LIKE', '%' . $request['search'] . '%');
        }
        return $builder->paginate(10);
    }

    public function createCategoryPost(array $request)
    {
        return CategoryPost::create($request);
    }

    public function findCategoryPost(array $request)
    {
        $builder = CategoryPost::where('id', $request['id']);
        return $builder->get();
    }

    public function updateCategoryPost(array $request)
    {
        $input = [
            'name' => $request['name'],
            'mota' => $request['mota']
        ];
        $builder = CategoryPost::where('id', $request['id'])
            ->update($input);
    }

    public function deleteCategoryPost(array $request)
    {
        foreach ($request as $key => $value) {
            $builder = CategoryPost::whereIn('id', $value)->delete();
        } 
    }
}
