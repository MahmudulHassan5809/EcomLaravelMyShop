<?php

namespace App\Http\Controllers;

use App\Product;
//use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\App;

class ShoppingController extends Controller
{
    //

    public function addCart(){
        $pdt = Product::find(request()->pdt_id);

        $cartItem = Cart::add([

            'id' => $pdt->id,
             'name'=>$pdt->name,
            'price'=>$pdt->price,
            'qty' => request()->qty
        ]);

     Cart::associate($cartItem->rowId,'App\Product');
     return redirect()->route('cart');


    }


    public function cart(){
        //Cart::destroy();
        return view('cart');
    }

    public function cartDelete($id){
        Cart::remove($id);
        return  redirect()->back();
    }

    public function increment($id,$qty){
         Cart::update($id,$qty + 1);
         return redirect()->back();
    }

    public function decrement($id,$qty){
        Cart::update($id,$qty - 1);
        return redirect()->back();
    }

    public  function  rapidAddCart($id){
        $pdt = Product::find($id);

        $cartItem = Cart::add([

            'id' => $pdt->id,
            'name'=>$pdt->name,
            'price'=>$pdt->price,
            'qty' =>1
        ]);

        Cart::associate($cartItem->rowId,'App\Product');
        return redirect()->route('cart');
    }


}
