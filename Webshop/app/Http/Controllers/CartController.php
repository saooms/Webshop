<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use Session;

class CartController extends Controller
{
    public function add(Request $request, $id){
        
        #we maken steeds een niew object aan, en als we er al een eerder hadden genven we die mee aan de constructor
        #dit is gedaan om items te kunnen stacken
        // $oldCart = (Session::has('cart'))? $request->session()->get('cart') : null;
        // $cart = new Cart($oldCart);
        $cart = Cart::get();
        $cart->add($id);
        return redirect()->back();  
    }

    public function remove(Request $request, $id){
        $cart = Cart::get();
        $cart->remove($id);
        return redirect()->back();
    }

    public function show(Request $request){
        $cart = Cart::get();
        return view('actions.showCart')->with('articles', $cart);
    }
}