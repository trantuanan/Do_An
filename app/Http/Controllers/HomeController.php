<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\ProductComplete;
use App\Models\Products;
use App\Models\CategoryProduct;
use App\Models\CategoryPost;

class HomeController extends Controller
{
    // public function postChangeLanguage() 
    // {
    //     $rules = [
    //     'language' => 'in:en,fr' //list of supported languages of your application.
    //     ];
        
    //     $language = Input::get('lang'); //lang is name of form select field.
        
    //     $validator = Validator::make(compact($language),$rules);
            
    //     if($validator->passes())
    //     {
    //                     Session::put('language',$language);
    //         App::setLocale($language);
    //     }
    //     else
    //     {/**/ }
    // }
    public function index(Request $request)
    {
        $post = new Post();
        $product = new ProductComplete();
        $cate = new CategoryProduct();
        $posts = $post->postIndex($request->all());
        $products = $product->postIndex($request->all());
        $category = $cate->postIndex($request->all());
        return view('index', ['posts' => $posts, 'products' => $products, 'categories' => $category]);
    }

    public function singleProduct($id)
    {
        $product = new Products();
        $products = $product->getSingleProduct($id);
        foreach ($products as  $value) {
            $products_lq =  $product->postProduct_LQ($value->category_id);
        }
        return view('pages.pageProduct', ['products' => $products, 'products_lq' => $products_lq]);
    }

    public function singleProductComplete($id)
    {
        $product = new ProductComplete();
        $products = $product->getSingleProduct($id);
        foreach ($products as  $value) {
            $products_lq =  $product->postProduct_LQ($value->category_id);
        }
        return view('pages.pageProductComplete', ['products' => $products, 'products_lq' => $products_lq]);
    }

    public function singlePost($id)
    {   
        $post = new Post();
        $posts = $post->getSinglePost($id);
        foreach ($posts as  $value) {
            $posts_lq =  $post->post_LQ($value->category_id);
        }
        return view('pages.pagePost', ['posts' => $posts, 'posts_lq' => $posts_lq]);
    }

    public function products(Request $request)
    {
        $product = new ProductComplete();
        $products = $product->postProducts($request->all());
        return view('product.ALL', ['products' => $products]);
    }

    public function productsCNC(Request $request)
    {
        $product = new ProductComplete();
        $products = $product->postProductsCNC($request->all());
        return view('product.CNC', ['products' => $products]);
    }

    public function productsLED(Request $request)
    {
        $product = new ProductComplete();
        $products = $product->postProductsLED($request->all());
        return view('product.LED', ['products' => $products]);
    }

    public function productsGC(Request $request)
    {
        $product = new ProductComplete();
        $products = $product->postProductsGC($request->all());
        return view('product.GC', ['products' => $products]);
    }

    public function productsTT(Request $request)
    {
        $product = new ProductComplete();
        $products = $product->postProductsTT($request->all());
        return view('product.TT', ['products' => $products]);
    }

    public function productsTL(Request $request)
    {
        $product = new ProductComplete();
        $products = $product->postProductsTL($request->all());
        return view('product.TL', ['products' => $products]);
    }

    public function productsCD(Request $request)
    {
        $product = new ProductComplete();
        $products = $product->postProductsCD($request->all());
        return view('product.CD', ['products' => $products]);
    }

    public function news(Request $request)
    {
        $post = new Post();
        $category = new CategoryPost();
        $posts = $post->postNews($request->all());
        $categories = $category->getList();
        return view('News', ['posts' => $posts, 'categories' => $categories]);
    }


    public function servicesLED(Request $request)
    {
        $product = new Products();
        $cate = new CategoryProduct();
        $products = $product->postProductLED($request->all());
        $category = $cate->postCategoryLED();
        return view('services.LED', ['products' => $products, 'categories' => $category]);
    }

    public function servicesCNC(Request $request)
    {
        $product = new Products();
        $cate = new CategoryProduct();
        $products = $product->postProductCNC($request->all());
        $category = $cate->postCategoryCNC();
        return view('services.CNC', ['products' => $products, 'categories' => $category]);
    }

    public function servicesGC(Request $request)
    {
        $product = new Products();
        $cate = new CategoryProduct();
        $products = $product->postProductGC($request->all());
        $category = $cate->postCategoryGC();
        return view('services.GC', ['products' => $products, 'categories' => $category]);
    }

    public function servicesTT(Request $request)
    {
        $product = new Products();
        $cate = new CategoryProduct();
        $products = $product->postProductTT($request->all());
        $category = $cate->postCategoryTT();
        return view('services.TT', ['products' => $products, 'categories' => $category]);
    }

    public function servicesTL(Request $request)
    {
        $product = new Products();
        $cate = new CategoryProduct();
        $products = $product->postProductTL($request->all());
        $category = $cate->postCategoryTL();
        return view('services.TL', ['products' => $products, 'categories' => $category]);
    }

    public function servicesCD(Request $request)
    {
        $product = new Products();
        $cate = new CategoryProduct();
        $products = $product->postProductCD($request->all());
        $category = $cate->postCategoryCD();
        return view('services.CD', ['products' => $products, 'categories' => $category]);
    }

    public function searchProductComplete(Request $request)
    {
        $product = new ProductComplete();
        if (isset($request->search)) {
            $products = $product->searchProducts($request->all());
            return view('search.productsComplete', ['products' => $products]);
        } else {
            return view('search.productsComplete');
        }
        
    }

    public function searchProduct(Request $request)
    {
        $product = new Products();
                // dd($request->all());

        if (isset($request->search)) {
            $products = $product->searchProduct($request->all());
            return view('search.products', ['products' => $products]);
        } else {
            return view('search.products');
        } 
        
    }

    public function searchNews(Request $request)
    {
        $post = new Post();
        dd('sdfsf');
        if (isset($request->search)) {
            $posts = $post->searchNews($request->all());
            return view('search.news', ['posts' => $posts]);
        } else {
            return view('search.news');
        }
        
    }
    public function changeLanguage($language)
    {
        \Session::put('website_language', $language);

        return redirect()->back();
    }
}
