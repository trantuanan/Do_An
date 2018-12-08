<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'name', 'size', 'vatlieu', 'baohanh', 'mota', 'trangthai', 'category_id', 'anh', 'dongia', 'masp'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function getList(array $request)
    {
        $builder = Products::orderBy('name', 'ASC')
        ->leftJoin('category_products_complete', 'category_products_complete.id', '=', 'products.category_id')
        ->select('products.*', 'category_products_complete.name as loaisp');
        if (isset($request['search'])) {
            $builder->where('products.name', 'LIKE', '%' . $request['search'] . '%');
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
        $last = Products::orderBy('masp', 'desc')->first();
        if (isset($last)) {
            $masp = $last->masp;
            $masp++;
            $request['masp'] = $masp;
        } else {
            $request['masp'] = 'SPD001';
        }
        return Products::create($request);
    }

    public function getProduct($id)
    {
        $builder = Products::where('id', $id);
        return $builder->get();
    }

    public function getSingleProduct($id)
    {
        $builder = Products::where('products.id', $id)
        ->leftJoin('category_products_complete', 'category_products_complete.id', '=', 'products.category_id')
        ->select('products.*', 'category_products_complete.name as loaisp');
        return $builder->get();
    }

    public function updateProduct(array $request)
    {
        if (isset($request['anh_1'])) {
            $request['anh'] = $request['anh_1']->getClientOriginalName();
        } 
        
        $input = [ 
            'name' => $request['name'],
            'mota' => $request['mota'],
            'size' => $request['size'],
            'vatlieu' => $request['vatlieu'],
            'baohanh' => $request['baohanh'],
            'trangthai' => $request['trangthai'],
            'category_id' => $request['category_id'],
            'dongia' => $request['dongia'],
            'anh' => $request['anh'],
            'updated_at' => Carbon::now(),
        ];
        $builder = Products::where('id', $request['id'])->update($input);
    }

    public function deleteProduct(array $request)
    {
        foreach ($request as $key => $value) {
            $builder = Products::whereIn('id', $value)->delete();
        } 
    }

    public function postProduct(array $request)
    {
        $builder = Products::orderBy('name', 'ASC')->where('trangthai', 1);
        if (isset($request['search'])) {
            $builder->where('products.name', 'LIKE', '%' . $request['search'] . '%');
        }
        return $builder->paginate(8);
    }

    public function postProduct_LQ($id)
    {
        $builder = Products::orderBy('name', 'ASC')->where('category_id', $id)->where('trangthai', 1);
        return $builder->paginate(4);
    }

    public function postProductLED(array $request)
    {
        if (isset($request['name'])) {
            $builder = Products::orderBy($request['name'], $request['order'])->where('category_id', 1)->where('trangthai', 1);
        } else {
            $builder = Products::orderBy('name', 'ASC')->where('category_id', 1)->where('trangthai', 1);
        }
        return $builder->paginate(8);
    }

    public function postProductCNC(array $request)
    {
        if (isset($request['name'])) {
            $builder = Products::orderBy($request['name'], $request['order'])->where('category_id', 4)->where('trangthai', 1);
        } else {
            $builder = Products::orderBy('name', 'ASC')->where('category_id', 4)->where('trangthai', 1);
        }
        return $builder->paginate(8);
    }

    public function postProductGC(array $request)
    {
        if (isset($request['name'])) {
            $builder = Products::orderBy($request['name'], $request['order'])->where('category_id', 5)->where('trangthai', 1);
        } else {
            $builder = Products::orderBy('name', 'ASC')->where('category_id', 5)->where('trangthai', 1);
        }
        return $builder->paginate(8);
    }

    public function postProductTL(array $request)
    {
        if (isset($request['name'])) {
            $builder = Products::orderBy($request['name'], $request['order'])->where('category_id', 2)->where('trangthai', 1);
        } else {
            $builder = Products::orderBy('name', 'ASC')->where('category_id', 2)->where('trangthai', 1);
        }
        return $builder->paginate(8);
    }

    public function postProductTT(array $request)
    {
        if (isset($request['name'])) {
            $builder = Products::orderBy($request['name'], $request['order'])->where('category_id', 3)->where('trangthai', 1);
        } else {
            $builder = Products::orderBy('name', 'ASC')->where('category_id', 3)->where('trangthai', 1);
        }
        return $builder->paginate(8);
    }

    public function postProductCD(array $request)
    {
        if (isset($request['name'])) {
            $builder = Products::orderBy($request['name'], $request['order'])->where('category_id', 6)->where('trangthai', 1);
        } else {
            $builder = Products::orderBy('name', 'ASC')->where('category_id', 6)->where('trangthai', 1);
        }
        return $builder->paginate(8);
    }

    public function searchProduct(array $request)
    {   
        $builder = Products::orderBy('name', 'ASC')->where('trangthai', 1);
        if (isset($request['search'])) {
            $builder->where('name', 'LIKE', '%' . $request['search'] . '%');
        } 
        return $builder->get();
    }

    public function findProduct(array $request)
    {
        $builder = Products::orderBy('products.name', 'ASC')
        ->leftJoin('category_products_complete', 'category_products_complete.id', '=', 'products.category_id')
        ->select('products.*', 'category_products_complete.name as loaisp');
        if (isset($request['search'])) {
            $builder->where('products.name', 'LIKE', '%' . $request['search'] . '%');
        }
        return $builder->get();
    }
}
