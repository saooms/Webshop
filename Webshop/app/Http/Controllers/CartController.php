<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use Session;

class CartController extends Controller
{
    public function add(Request $request, $id){
        // $value = $request->session()->get('_token');
        // session(['key' => []]);
        // $value = $request->session()->pull('key', 'default');
        // $value = session('key', 'perhaps');

        // $request->session()->put('key', $id);

        $cart = (Session::has('cart'))? $request->session()->get('cart') : new Cart();
        
        $cart->add($id);
        $request->session()->put('cart', $cart);
        // $value = $request->session()->all();
        return redirect()->back();  
    }

    public function remove(Request $request, $id){
        $cart = $request->session()->get('cart');
        $cart->remove($id);
        $request->session()->put('cart', $cart);
        
        return redirect()->back();
    }

    public function show(Request $request){
        $cart = $request->session()->get('cart');
        $articles = (Session::has('cart') & count($cart->items)>0)?  $cart->items : null;

        return view('actions.showCart')->with('articles', $articles);
    }
}