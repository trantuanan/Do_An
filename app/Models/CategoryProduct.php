<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    protected $table = 'category_products_complete';
    protected $fillable = [
        'name', 'mota'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function getList(array $request)
    {
        $builder = CategoryProduct::orderBy('id', 'ASC');
        if (isset($request['search'])) {
            $builder->where('name', 'LIKE', '%' . $request['search'] . '%');
        }
        return $builder->paginate(10);
    }

    public function getCategory()
    {
        $builder = CategoryProduct::orderBy('name', 'ASC');
        return $builder->get();
    }

    public function createCategory(array $request)
    {
        return CategoryProduct::create($request);
    }

    public function findCategory(array $request)
    {
        $builder = CategoryProduct::where('id', $request['id']);
        return $builder->get();
    }

    public function updateCategory(array $request)
    {
        $input = [
            'name' => $request['name'],
            'mota' => $request['mota']
        ];
        $builder = CategoryProduct::where('id', $request['id'])
            ->update($input);
    }

    public function deleteCategory(array $request)
    {
        foreach ($request as $key => $value) {
            $builder = CategoryProduct::whereIn('id', $value)->delete();
        } 
    }

    public function postIndex(array $request)
    {
        $builder = CategoryProduct::orderBy('id', 'ASC');
        if (isset($request['search'])) {
            $builder->where('name', 'LIKE', '%' . $request['search'] . '%');
        }
        return $builder->paginate(6);
    }

    public function postCategoryLED()
    {
        $builder = CategoryProduct::where('id', 1);
        return $builder->get();
    }

    public function postCategoryGC()
    {
        $builder = CategoryProduct::where('id', 5);
        return $builder->get();
    }

    public function postCategoryCNC()
    {
        $builder = CategoryProduct::where('id', 4);
        return $builder->get();
    }

    public function postCategoryTT()
    {
        $builder = CategoryProduct::where('id', 3);
        return $builder->get();
    }

    public function postCategoryTL()
    {
        $builder = CategoryProduct::where('id', 2);
        return $builder->get();
    }

    public function postCategoryCD()
    {
        $builder = CategoryProduct::where('id', 6);
        return $builder->get();
    }
}
