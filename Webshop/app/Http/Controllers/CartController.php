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
        
        #we maken steeds een niew object aan, en als we er al een eerder hadden genven we die mee aan de constructor
        #dit is gedaan om items te kunnen stacken
        $oldCart = (Session::has('cart'))? $request->session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($id);
        $request->session()->put('cart', $cart);
        // return $value = $request->session()->all();
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
        // $articles = (Session::has('cart') && count($cart->items)>0)?  $cart->items : null;
        return view('actions.showCart')->with('articles', $cart);
    }
}