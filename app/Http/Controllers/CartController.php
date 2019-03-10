<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add_to_cart() {

        $product = Product::find(request()->pdt_id);

        $cartItem = Cart::add([
            'id'=>$product->id,
            'name'=>$product->name,
            'price'=>$product->price,
            'qty'=>request()->qty,
        ]);
        Cart::associate($cartItem->rowId, 'App\Product');
//        $cartItem->associate('App\Product');

        return redirect('cart');
    }

    public function cart() {
//        Cart::destroy();
        return view('cart');
    }

    public function cart_delete($id) {
        Cart::remove($id);
        return redirect()->back();
    }

    public function incr($id, $qty) {

        Cart::update($id, $qty+1);

        return redirect()->back();
    }

    public function decr($id, $qty) {

        Cart::update($id, $qty-1);

        return redirect()->back();
    }

    public function rapid_add($id) {
        $product = Product::find($id);

        $cartItem = Cart::add([
            'id'=>$product->id,
            'name'=>$product->name,
            'price'=>$product->price,
            'qty'=>1
        ]);
        Cart::associate($cartItem->rowId, 'App\Product');
//        $cartItem->associate('App\Product');

        return redirect()->back();
    }
}
