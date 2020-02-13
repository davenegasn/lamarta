<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class PagesController extends Controller
{
	 /**
	 * Show the application home.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
    public function index()
    {
    	$categories = Category::orderBy('display_order')->get();
        return view('home', compact('categories'));
    }
}
