<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryPost;

class CategoryPostController extends Controller
{
    public $category;

    public function __construct(CategoryPost $category) {
        $this->middleware('auth');
        $this->category = $category;
    }

    public function index(Request $request)
    {
        $this->authorize('Q1_2');
        $category = $this->category->getList();
        return view('BackEnd.QLDM.categoryPost', ['categories' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('Q1_2');
        if ($request->ajax()) {
            $category = $this->category->createCategoryPost($request->all());
            return 'Tạo loại tin tức thành công!';
        }
    }

    public function find(Request $request)
    {
        $this->authorize('Q1_2');
        if ($request->ajax()) {
            $category = $this->category->findCategoryPost($request->all());
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
        $this->authorize('Q1_2');
        if ($request->ajax()) {
            $category = $this->category->updateCategoryPost($request->all());
            return Response('Sửa loại tin tức thành công!');
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
        $this->authorize('Q1_2');
        if ($request->ajax()) {
            $category = $this->category->deleteCategoryPost($request->all());
            return Response('Xóa loại bài viết thành công!');
        }
    }
}
