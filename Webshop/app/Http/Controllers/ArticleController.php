<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;
use App\Categories;

class ArticleController extends Controller
{
    public function index(Request $request, $class)
    {
        $types = Categories::all();

        for ($i=0; $i < count($types); $i++) { 
            if ($types[$i]->title == $class) {
                $category = Categories::find(++$i)->articles;
                return view('category')->with('category', $category);
            }
        }        
    }

    public function show(Request $request, $class, $id)
    {
        $article = Articles::Find($id);
        $cartItem = null;

        if ($request->session()->has('cart')) {
            $cartItems = $request->session()->get('cart')->items;
            
            foreach ($cartItems as $item) {
                if (array_search($item, $cartItems) == $id) {
                    $cartItem = $cartItems[$id];
                }
            }
        }
        return view('actions.show')->with('article', $article)->with('item', $cartItem);
    }
}
