<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryProduct;

class CategoryProductController extends Controller
{
    public $category;

    public function __construct(CategoryProduct $category) {
        $this->middleware('auth');
        $this->category = $category;
    }

    public function index(Request $request)
    {
        $this->authorize('Q2_1');
        $category = $this->category->getList($request->all());
        return view('BackEnd.QLDH.categoryProduct', ['categories' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('Q2_1');
        if ($request->ajax()) {
            $category = $this->category->createCategory($request->all());
            return 'Tạo loại sản phẩm thành công!';
        }
    }

    public function find(Request $request)
    {
        $this->authorize('Q2_1');
        if ($request->ajax()) {
            $category = $this->category->findCategory($request->all());
            return Response($category);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('Q2_1');
        if ($request->ajax()) {
            $category = $this->category->updateCategory($request->all());
            return Response('Sửa loại sản phẩm thành công!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
            $category = $this->category->deleteCategory($request->all());
            return Response('Xóa loại sản phẩm thành công!');
        }
    }
}
