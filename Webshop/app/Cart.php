<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Articles;

class Cart 
{
    public $items = [];
    public $itemQTY = 0;
    public $totalPrice = 0;

    // public function __CONSTRUCTOR(){

    // }

    public function add($id){
        $product = Articles::find($id);
        array_push($this->items, $product);
        $this->itemQTY = count($this->items);
        $this->totalPrice += $product->price;
    }

    public function remove($id){
        for ($i=0; $i < count($this->items); $i++) { 
            $this->items = array_values($this->items);
            if ($this->items[$i]->id == $id) {
                unset($this->items[$i]);
                $this->items = array_values($this->items);
                break;
            }
        }
    }
}
