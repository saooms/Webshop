<?php
namespace App\Http\Controllers;
use App\Articles;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
        $articles = Articles::all();
        return view('home')->with('articles', $articles);
    }
}