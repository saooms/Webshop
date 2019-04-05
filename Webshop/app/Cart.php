<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Articles;
use Illuminate\Support\Facades\Session;

class Cart 
{
    public $items = [];
    public $itemQTY = 0;
    public $totalPrice = 0;

    #voor elk aparte item meken we een nieuwe array aan, anders kunnen we gewoon de 
    #QTY verhogen van een betsaande array
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

    #we kijken of er al een cart bestaat, zo ja gebruiken we die, anders maken we er een nieuwe aan.
    public static function get() {
        $cart = (Session::has('cart'))?Session::get('cart') :new Cart();
        return $cart;
    }
}
