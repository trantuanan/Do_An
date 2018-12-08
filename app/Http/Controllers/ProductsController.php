<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\CategoryProduct;
use App\Models\Supplies;
use App\Models\Material;
use App\Http\Requests\CreateProductRequest;

class ProductsController extends Controller
{
    public $products;

    public function __construct(Products $products) {
        $this->middleware('auth');
        $this->products = $products;
    }

    public function index(Request $request)
    {
        $this->authorize('Q2_1');
        $product = $this->products->getList($request->all());
        return view('BackEnd.QLDH.products', ['products' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('Q2_1');
        $category = new CategoryProduct();
        $cate = $category->getCategory();
        return view('BackEnd.TacVu.CreateProduct', ['categories' => $cate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $this->authorize('Q2_1');
        if ($request->hasFile('anh')) {
            $file = $request->file('anh');
            $file->move('upload/imageProducts', $file->getClientOriginalName());
        }
        $product = $this->products->createProduct($request->all());
        flash('Thêm mới sản phẩm thành công.')->success();
        return redirect()->route('quanlysanpham.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('Q2_1');
        $category = new CategoryProduct();
        $supplie = new Supplies();
        $material = new Material();
        $materials = $material->getMaterialProduct($id);
        $cate = $category->getCategory();
        $supplies = $supplie->getListSupplies();
        $product = $this->products->getProduct($id);
        return view('BackEnd.TacVu.EditProducts', ['categories' => $cate, 'supplies' => $supplies, 'products' => $product, 'materials' => $materials]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->authorize('Q2_1');  
        if ($request->hasFile('anh_1')) {
            $file = $request->file('anh_1');
            $file->move('upload/imageProducts', $file->getClientOriginalName());
        } else {
            $request->anh = $request->anh_1;
        }
        $product = $this->products->updateProduct($request->all());
        flash('Sửa thông tin sản phẩm thành công.')->success();
        return redirect()->route('quanlysanpham.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->authorize('Q2_1');
        if ($request->ajax()) {
            $product = $this->products->deleteProduct($request->all());
            return Response('Xóa sản phẩm thành công!');
        }
    }
}
