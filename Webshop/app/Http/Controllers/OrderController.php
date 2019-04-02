<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use App\OrderDetails;
use Auth;

class OrderController extends Controller
{
    public function index(Request $request){
        
        $orders = Auth::user()->orders;  
        
        return view('actions.showOrders')->with('orders', $orders);
    }

    public function show($id){
        
        $order = Orders::find($id);
        
        if ($order->user_id == Auth::user()->id) {
            return view('actions.showOrder')->with('order', $order);
        }
        else {
            return ("this is not yours...");
        }
        
        // return view('actions.showOrders')->with('orders', $orders);
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
            $orderDetails->article_id = $item['item']->id;
            $orderDetails->save();
        }
        

        return redirect('/home')->with('success', 'order successfully placed');
    }
}
