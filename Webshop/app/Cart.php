<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Articles;
use Illuminate\Support\Facades\Session;

class Cart 
{
    public $items = [];

    /* voor elk aparte item maken we een nieuwe array aan, anders kunnen we gewoon de 
     QTY verhogen van een betsaande array */
    public function add($id){
        $product = Articles::find($id);
        $storedItem = ['QTY' => 0, 'price' => 0, 'item' => $product];
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['QTY']++;
        $storedItem['price'] = $product->price * $storedItem['QTY'];
        $this->items[$id] = $storedItem;
        $this->totalPrice += $product->price;
        $this->itemQTY++;
        
        $cart = $this;
        Session::put('cart', $cart);
    }

    public function remove($id){
        $product = Articles::find($id);
        
        $this->items[$id]['QTY']--;
        $this->items[$id]['price'] = $product->price * $this->items[$id]['QTY'];
        $this->totalPrice -= $product->price;
        
        if ($this->items[$id]['QTY'] <= 0){
            unset($this->items[$id]);
        }
            
        Session::put('cart', $this);
    }

    private static function exist(){
        $response = (Session::has('cart'))?true :false;
        return $response;
    }

    //we kijken of er al een cart bestaat, zo ja gebruiken we die, anders maken we er een nieuwe aan.
    //als er een id wordt mee gegeven willen we het individuele item meegeven. maar als basis zetten we hem op false
    public static function get($id = false) {
        if ($id) {
            if  (Cart::exist()){
                if (array_key_exists($id, Session::get('cart')->items)) {
                    return Session::get('cart')->items[$id];
                }
                else {
                    return null;
                }
            } else {
                return null;
            }
            
        } else {
            $cart = (Cart::exist())?Session::get('cart') :new Cart();
            return $cart;
        }
    }

    public static function totalPrice(){
        $total = 0;
        $items = Session::get('cart')->items;
        foreach ($items as $item) {
            $total += $item['price'];
        }
        return $total;
    }
}
