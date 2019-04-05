<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use App\OrderDetails;
use App\Cart;
use Auth;

class OrderController extends Controller
{
    public function index(Request $request){
        
        if (Auth::user()){
            $orders = Auth::user()->orders;
        }
        else {
            $orders = null;
        }
        
        return view('actions.showOrders')->with('orders', $orders);
    }


    #hier worden de orders laten zien, maar we willen niet dat iedereen bij de orders van anderen kunnen,
    #vandaar de if else statement.
    public function show($id){
        
        $order = Orders::find($id);
        
        if ($order->user_id == Auth::user()->id) {
            return view('actions.showOrder')->with('order', $order);
        }
        else {
            return ("this is not yours...");
        }
    }


    #er wordt een order aangemaakt, en dan voor elk artikel wordt er een soort sub order gemaakt,
    #genaamt order details, hier in staat het type aantal en combonatie price.
    public function store(){
        $cart = Cart::get();

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
