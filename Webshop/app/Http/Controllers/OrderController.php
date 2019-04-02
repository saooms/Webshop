<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use App\OrderDetails;
use Auth;

class OrderController extends Controller
{
    public function show(Request $request){
        
        $order = Orders::find(1)->orderDetails->find(2)->article;  
        
        return $order;

    }

    public function store(Request $request){
        $cart = $request->session()->get('cart');

        $order = new Orders;
        $order->user_id = Auth::user()->id;
        $order->totalPrice = $cart->totalPrice;
        $order->save();

        foreach ($cart->items as $item) {
            $orderDetails = new OrderDetails;
            $orderDetails->price = $item['price'];
            $orderDetails->QTY = $item['QTY'];
            $orderDetails->orders_id = $order->id;
            $orderDetails->articles_id = $item['item']->id;
            $orderDetails->save();
        }
        

        return redirect('/home')->with('success', 'order successfully placed');
    }
}
