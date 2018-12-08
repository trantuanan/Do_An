<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductComplete;
use App\Models\CategoryProduct;
use App\Http\Requests\CreateProductCompleteRequest;


class ProductCompleteController extends Controller
{
    public $productcomplete;

    public function __construct(ProductComplete $productcomplete) {
        $this->middleware('auth');
        $this->productcomplete = $productcomplete;
    }

    public function index(Request $request)
    {
        $this->authorize('Q1_1');
        $productcom = $this->productcomplete->getList($request->all());
        return view('BackEnd.QLDM.productComplete', ['productcomplete' => $productcom]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('Q1_1');
        $category = new CategoryProduct();
        $cate = $category->getCategory();
        return view('BackEnd.TacVu.CreateProductComplete', ['categories' => $cate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductCompleteRequest $request)
    {
        $this->authorize('Q1_1');
        if ($request->hasFile('anh')) {
            $file = $request->file('anh');
            $file->move('upload/imageProductComplete', $file->getClientOriginalName());
        }
        $productcom = $this->productcomplete->createProduct($request->all());
        flash('Thêm mới sản phẩm thành công.')->success();
        return redirect()->route('quanlysanphamht.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('Q1_1');
        $category = new CategoryProduct();
        $cate = $category->getCategory();
        $productcom = $this->productcomplete->getProduct($id);
        return view('BackEnd.TacVu.EditProductComplete', ['categories' => $cate], ['productcomplete' => $productcom]);
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
    public function update(CreateProductCompleteRequest $request)
    {
        $this->authorize('Q1_1');  
        if ($request->hasFile('anh_1')) {
            $file = $request->file('anh_1');
            $file->move('upload/imageProductComplete', $file->getClientOriginalName());
        } else {
            $request->anh = $request->anh_1;
        }
        $productcom = $this->productcomplete->updateProduct($request->all());
        flash('Sửa thông tin sản phẩm thành công.')->success();
        return redirect()->route('quanlysanphamht.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->authorize('Q1_1');
        if ($request->ajax()) {
            $productcom = $this->productcomplete->deleteProduct($request->all());
            return Response('Xóa sản phẩm thành công!');
        }
    }
}
