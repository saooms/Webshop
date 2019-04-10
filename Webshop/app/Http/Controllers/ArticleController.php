<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;
use App\Categories;
use App\Cart;

class ArticleController extends Controller
{
    public function index(Request $request, $class)
    {
        $category = Categories::where('title', $class)->first()->articles;
        return view('category')->with('category', $category); 
    }

    public function show(Request $request, $class, $id)
    {
        $article = Articles::Find($id);

        /*als de cart dit item bezit geeft hij deze mee, hier in zitten de qty en gecombineerde prijs in.
        als de cart het item niet heeft returnt het een NULL value.*/
        $cartItem = Cart::get($id);

        return view('actions.show')->with('article', $article)->with('item', $cartItem);
    }
}
