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
        $qty = 0;
        if ($request->session()->has('cart')) {
            foreach (($request->session()->get('cart'))->items as $item) {
                if ($item->id == $id) {
                    $qty++;
                }
            }
        }
        return view('actions.show')->with('article', $article)->with('qty', $qty);
    }
}
