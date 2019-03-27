<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;
use App\Categories;

class ArticleController extends Controller
{
    public function index($class)
    {
        $types = Categories::all();

        for ($i=0; $i < count($types); $i++) { 
            if ($types[$i]->title == $class) {
                $category = Categories::find(++$i)->articles;
                return view('category')->with('category', $category);
            }
        }        
    }

    public function show($class, $id)
    {
        $article = Articles::Find($id);
        return view('actions.show')->with('article', $article);
    }
}
