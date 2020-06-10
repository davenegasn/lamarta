<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class SearchController extends Controller
{
    public function search(Request $request)
    {
    	$results = Product::where('title', 'like', $request->keywords .'%')
    				->orWhere('slug', 'like', $request->keywords .'%')->get();

    	return response()->json($results);
    }
}
