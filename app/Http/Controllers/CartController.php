<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laracasts\Flash\FlashServiceProvider;
use Cart;

class CartController extends Controller
{
    public function index(Request $request)
    {
    	 $cart = Cart::content();
        return view('Cart', ['cart' => $cart]);
    }

    public function store(Request $request)
    {
    	$duplicates = Cart::search(function($cartItem, $rowId) use ($request) {
    		return $cartItem->id === $request->id;
    	});
    	if ($duplicates->isNotEmpty()) {
    		flash('Mặt hàng đã sẵn sàng trong giỏ.')->success();
        	return redirect()->Route('cart.index');
    	}
        Cart::add($request->id, $request->name, 1,$request->dongia,['size' => $request->size, 'image' => $request->image, 'vatlieu' => $request->vatlieu]);
        flash('Thêm mặt hàng thành công.')->success();
        return redirect()->Route('cart.index');
    }

    public function destroy($id)
    {
        Cart::remove($id);
        flash('Xóa mặt hàng thành công.')->success();
        return redirect()->Route('cart.index');
    }

    public function update(Request $request)
    {
        Cart::update($request->id, ['qty' => $request->qty]);
        return redirect()->Route('cart.index');
    }
}
