<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'title', 'mota', 'noidung', 'trangthai', 'category_id', 'users_id', 'anh', 'matt'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function getList(array $request)
    {
        $builder = Post::orderBy('title', 'ASC')
        ->leftJoin('category_posts', 'category_posts.id', '=', 'posts.category_id')
        ->select('posts.*', 'category_posts.name as loaitt');
        if (isset($request['search'])) {
            $builder->where('title', 'LIKE', '%' . $request['search'] . '%');
        }
        return $builder->paginate(10);
    }

    public function createPost(array $request)
    {
        if (isset($request['anh'])) {
            $request['anh'] = $request['anh']->getClientOriginalName();
        } else {
            $request['anh'] = 'default_avatar.jpg';
        }
        $last = Post::orderBy('matt', 'desc')->first();
        if (isset($last)) {
            $matt = $last->matt;
            $matt++;
            $request['matt'] = $matt;
        } else {
            $request['matt'] = 'TT001';
        }
        return Post::create($request);
    }

    public function getPost($id)
    {
        $builder = Post::where('id', $id);
        return $builder->get();
    }

    public function getSinglePost($id)
    {
        $builder = Post::where('posts.id', $id)
        ->leftJoin('category_posts', 'category_posts.id', '=', 'posts.category_id')
        ->leftJoin('users', 'users.id', '=', 'posts.users_id')
        ->select('posts.*', 'category_posts.name as loaitt', 'users.name as tacgia');
        return $builder->get();
    }

    public function post_LQ($id)
    {
        $builder = Post::orderBy('title', 'ASC')->where('category_id', $id)->where('trangthai', 1);
        return $builder->paginate(4);
    }

    public function updatePost(array $request)
    {
        if (isset($request['anh_1'])) {
            $request['anh'] = $request['anh_1']->getClientOriginalName();
        } 
        
        $input = [ 
            'title' => $request['title'],
            'mota' => $request['mota'],
            'noidung' => $request['noidung'],
            'trangthai' => $request['trangthai'],
            'category_id' => $request['category_id'],
            'users_id' => $request['users_id'],
            'anh' => $request['anh'],
            'updated_at' => Carbon::now(),
        ];
        $builder = Post::where('id', $request['id'])->update($input);
    }

    public function deletePost(array $request)
    {
        foreach ($request as $key => $value) {
            $builder = Post::whereIn('id', $value)->delete();
        } 
    }

    public function postIndex(array $request)
    {
        $builder = Post::orderBy('title', 'ASC')
        ->where('posts.category_id', 1)
        ->where('trangthai', 1);
        return $builder->paginate(8);
    }

    public function postNews(array $request)
    {
        $builder = Post::orderBy('title', 'ASC')
        ->where('trangthai', 1);
        if (isset($request['id'])) {
            $builder->where('category_id', $request['id']);
        } 
        return $builder->paginate(8);
    }

    public function searchNews(array $request)
    {
        $builder = Post::orderBy('title', 'ASC')
        ->leftJoin('category_posts', 'category_posts.id', '=', 'posts.category_id')
        ->select('posts.*', 'category_posts.name as loaitt');
        if (isset($request['search'])) {
            $builder->where('title', 'LIKE', '%' . $request['search'] . '%');
        }
        return $builder->get();
    }

}
