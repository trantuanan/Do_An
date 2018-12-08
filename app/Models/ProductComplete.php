<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ProductComplete extends Model
{
    protected $table = 'products_complete';
    protected $fillable = [
        'name', 'diadiem', 'thoigian', 'mota', 'trangthai', 'category_id', 'users_id', 'anh', 'maspht'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function getList(array $request)
    {
        $builder = ProductComplete::orderBy('name', 'ASC')
        ->leftJoin('category_products_complete', 'category_products_complete.id', '=', 'products_complete.category_id')
        ->select('products_complete.*', 'category_products_complete.name as loaisp');
        if (isset($request['search'])) {
            $builder->where('products_complete.name', 'LIKE', '%' . $request['search'] . '%');
        }
        return $builder->paginate(10);
    }

    public function createProduct(array $request)
    {
        if (isset($request['anh'])) {
            $request['anh'] = $request['anh']->getClientOriginalName();
        } else {
            $request['anh'] = 'default_avatar.jpg';
        }
        $last = ProductComplete::orderBy('maspht', 'desc')->first();
        if (isset($last)) {
            $maspht = $last->maspht;
            $maspht++;
            $request['maspht'] = $maspht;
        } else {
            $request['maspht'] = 'SPHT001';
        }
        return ProductComplete::create($request);
    }

    public function getProduct($id)
    {
        $builder = ProductComplete::where('id', $id);
        return $builder->get();
    }

    public function getSingleProduct($id)
    {
        $builder = ProductComplete::where('products_complete.id', $id)
        ->leftJoin('category_products_complete', 'category_products_complete.id', '=', 'products_complete.category_id')
        ->leftJoin('users', 'users.id', '=', 'products_complete.users_id')
        ->select('products_complete.*', 'category_products_complete.name as loaisp', 'users.name as ngtao');
        return $builder->get();
    }

    public function postProduct_LQ($id)
    {
        $builder = ProductComplete::orderBy('name', 'ASC')->where('category_id', $id)->where('trangthai', 1);
        return $builder->paginate(30);
    }

    public function updateProduct(array $request)
    {
        if (isset($request['anh_1'])) {
            $request['anh'] = $request['anh_1']->getClientOriginalName();
        } 
        
        $input = [ 
            'name' => $request['name'],
            'mota' => $request['mota'],
            'thoigian' => $request['thoigian'],
            'diadiem' => $request['diadiem'],
            'trangthai' => $request['trangthai'],
            'category_id' => $request['category_id'],
            'users_id' => $request['users_id'],
            'anh' => $request['anh'],
            'updated_at' => Carbon::now(),
        ];
        $builder = ProductComplete::where('id', $request['id'])->update($input);
    }

    public function deleteProduct(array $request)
    {
        foreach ($request as $key => $value) {
            $builder = ProductComplete::whereIn('id', $value)->delete();
        } 
    }

    public function postIndex(array $request)
    {
        $builder = ProductComplete::orderBy('name', 'ASC')
        ->leftJoin('category_products_complete', 'category_products_complete.id', '=', 'products_complete.category_id')
        ->select('products_complete.*', 'category_products_complete.name as loaisp')
        ->where('products_complete.trangthai', 1);
        if (isset($request['search'])) {
            $builder->where('products_complete.name', 'LIKE', '%' . $request['search'] . '%');
        }
        return $builder->paginate(25);
    }

    public function postProducts(array $request)
    {
        if (isset($request['name'])) {
            $builder = ProductComplete::orderBy($request['name'], $request['order'])
            ->leftJoin('category_products_complete', 'category_products_complete.id', '=', 'products_complete.category_id')
            ->select('products_complete.*', 'category_products_complete.name as loaisp')
            ->where('products_complete.trangthai', 1);
        } else {
            $builder = ProductComplete::orderBy('created_at', 'ASC')
            ->leftJoin('category_products_complete', 'category_products_complete.id', '=', 'products_complete.category_id')
            ->select('products_complete.*', 'category_products_complete.name as loaisp')
            ->where('products_complete.trangthai', 1);
        }  
        return $builder->paginate(30);
    }

    public function postProductsCNC(array $request)
    {
        if (isset($request['name'])) {
            $builder = ProductComplete::orderBy($request['name'], $request['order'])
            ->leftJoin('category_products_complete', 'category_products_complete.id', '=', 'products_complete.category_id')
            ->select('products_complete.*', 'category_products_complete.name as loaisp')
            ->where('products_complete.trangthai', 1)
            ->where('products_complete.category_id', 4);
        } else {
            $builder = ProductComplete::orderBy('created_at', 'ASC')
            ->leftJoin('category_products_complete', 'category_products_complete.id', '=', 'products_complete.category_id')
            ->select('products_complete.*', 'category_products_complete.name as loaisp')
            ->where('products_complete.trangthai', 1)
            ->where('products_complete.category_id', 4);
        }  
        return $builder->paginate(30);
    }

    public function postProductsLED(array $request)
    {
        if (isset($request['name'])) {
            $builder = ProductComplete::orderBy($request['name'], $request['order'])
            ->leftJoin('category_products_complete', 'category_products_complete.id', '=', 'products_complete.category_id')
            ->select('products_complete.*', 'category_products_complete.name as loaisp')
            ->where('products_complete.trangthai', 1)
            ->where('products_complete.category_id', 1);
        } else {
            $builder = ProductComplete::orderBy('created_at', 'ASC')
            ->leftJoin('category_products_complete', 'category_products_complete.id', '=', 'products_complete.category_id')
            ->select('products_complete.*', 'category_products_complete.name as loaisp')
            ->where('products_complete.trangthai', 1)
            ->where('products_complete.category_id', 1);
        }  
        return $builder->paginate(30);
    }

    public function postProductsGC(array $request)
    {
        if (isset($request['name'])) {
            $builder = ProductComplete::orderBy($request['name'], $request['order'])
            ->leftJoin('category_products_complete', 'category_products_complete.id', '=', 'products_complete.category_id')
            ->select('products_complete.*', 'category_products_complete.name as loaisp')
            ->where('products_complete.trangthai', 1)
            ->where('products_complete.category_id', 5);
        } else {
            $builder = ProductComplete::orderBy('created_at', 'ASC')
            ->leftJoin('category_products_complete', 'category_products_complete.id', '=', 'products_complete.category_id')
            ->select('products_complete.*', 'category_products_complete.name as loaisp')
            ->where('products_complete.trangthai', 1)
            ->where('products_complete.category_id', 5);
        }  
        return $builder->paginate(30);
    }

    public function postProductsTT(array $request)
    {
        if (isset($request['name'])) {
            $builder = ProductComplete::orderBy($request['name'], $request['order'])
            ->leftJoin('category_products_complete', 'category_products_complete.id', '=', 'products_complete.category_id')
            ->select('products_complete.*', 'category_products_complete.name as loaisp')
            ->where('products_complete.trangthai', 1)
            ->where('products_complete.category_id', 3);
        } else {
            $builder = ProductComplete::orderBy('created_at', 'ASC')
            ->leftJoin('category_products_complete', 'category_products_complete.id', '=', 'products_complete.category_id')
            ->select('products_complete.*', 'category_products_complete.name as loaisp')
            ->where('products_complete.trangthai', 1)
            ->where('products_complete.category_id', 3);
        }  
        return $builder->paginate(30);
    }

    public function postProductsTL(array $request)
    {
        if (isset($request['name'])) {
            $builder = ProductComplete::orderBy($request['name'], $request['order'])
            ->leftJoin('category_products_complete', 'category_products_complete.id', '=', 'products_complete.category_id')
            ->select('products_complete.*', 'category_products_complete.name as loaisp')
            ->where('products_complete.trangthai', 1)
            ->where('products_complete.category_id', 2);
        } else {
            $builder = ProductComplete::orderBy('created_at', 'ASC')
            ->leftJoin('category_products_complete', 'category_products_complete.id', '=', 'products_complete.category_id')
            ->select('products_complete.*', 'category_products_complete.name as loaisp')
            ->where('products_complete.trangthai', 1)
            ->where('products_complete.category_id', 2);
        }  
        return $builder->paginate(30);
    }

    public function postProductsCD(array $request)
    {
        if (isset($request['name'])) {
            $builder = ProductComplete::orderBy($request['name'], $request['order'])
            ->leftJoin('category_products_complete', 'category_products_complete.id', '=', 'products_complete.category_id')
            ->select('products_complete.*', 'category_products_complete.name as loaisp')
            ->where('products_complete.trangthai', 1)
            ->where('products_complete.category_id', 6);
        } else {
            $builder = ProductComplete::orderBy('created_at', 'ASC')
            ->leftJoin('category_products_complete', 'category_products_complete.id', '=', 'products_complete.category_id')
            ->select('products_complete.*', 'category_products_complete.name as loaisp')
            ->where('products_complete.trangthai', 1)
            ->where('products_complete.category_id', 6);
        }  
        return $builder->paginate(30);
    }

    public function searchProducts(array $request)
    {
        $builder = ProductComplete::orderBy('created_at', 'ASC')
            ->leftJoin('category_products_complete', 'category_products_complete.id', '=', 'products_complete.category_id')
            ->select('products_complete.*', 'category_products_complete.name as loaisp')
            ->where('products_complete.trangthai', 1);
        if (isset($request['search'])) {
            $builder->where('products_complete.name', 'LIKE', '%' . $request['search'] . '%');
        }
        return $builder->get();
    }
}
