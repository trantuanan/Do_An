<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\CategoryPost;
use App\Http\Requests\CreatePostRequest;

class PostController extends Controller
{
    public $post;

    public function __construct(Post $post) {
        $this->middleware('auth');
        $this->post = $post;
    }


    public function index(Request $request)
    {
        $this->authorize('Q1_2');
        $post = $this->post->getList($request->all());
        return view('BackEnd.QLDM.post', ['posts' => $post]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('Q1_2');
        $cate = new CategoryPost();
        $category = $cate->getList();
        return view('BackEnd.TacVu.CreatePost', ['categories' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $this->authorize('Q1_2');
        if ($request->hasFile('anh')) {
            $file = $request->file('anh');
            $file->move('upload/imagePost', $file->getClientOriginalName());
        }
        $post = $this->post->createPost($request->all());
        flash('Thêm mới tin tức thành công.')->success();
        return redirect()->route('quanlytintuc.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('Q1_2');
        $cate = new CategoryPost();
        $category = $cate->getList();
        $post = $this->post->getPost($id);
        return view('BackEnd.TacVu.EditPost', ['categories' => $category], ['posts' => $post]);
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
    public function update(CreatePostRequest $request)
    {
        $this->authorize('Q1_2');  
        if ($request->hasFile('anh_1')) {
            $file = $request->file('anh_1');
            $file->move('upload/imagePost', $file->getClientOriginalName());
        } else {
            $request->anh = $request->anh_1;
        }
        
        $post = $this->post->updatePost($request->all());
        flash('Sửa thông tin bài viết thành công.')->success();
        return redirect()->route('quanlytintuc.index');
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
            $post = $this->post->deletePost($request->all());
            return Response('Xóa bài viết thành công!');
        }
    }
}
