<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Articles;

class Cart 
{
    public $items = [];
    public $itemQTY = 0;
    public $totalPrice = 0;

    public function __construct($old){
        if($old){
            $this->items = $old->items;
            $this->itemQTY = $old->itemQTY;
            $this->totalPrice = $old->totalPrice;
        }
    }

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
        // array_push($this->items, $product);
        // $this->itemQTY = count($this->items);
        // $this->totalPrice += $product->price;
    }

    public function remove($id){
        $product = Articles::find($id);
        
        $this->items[$id]['QTY']--;
        $this->items[$id]['price'] = $product->price * $this->items[$id]['QTY'];
        $this->totalPrice -= $product->price;
        
        if ($this->items[$id]['QTY'] <= 0){
            unset($this->items[$id]);
        }
            
    }
}
