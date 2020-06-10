<?php

namespace App\Http\Controllers;
use App\Slider;
use App\Product;
use app\Category;
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
    	
        $slides = Slider::orderBy('display_order')->get();
        $homeCats = Category::orderBy('display_order')->paginate(4);
        
        return view('home', compact('slides', 'homeCats'));
    }

    public function categoryCatalog(Category $category)
    {
        $pageTitle = $category->name;
        $products = $category->products;
        $categories = Category::orderBy('display_order')->get();
        
        return view('catalog', compact('products', 'pageTitle',  'categories'));
    }

    public function productShow(Category $category, Product $product)
    {

        $pageTitle = $product->title;
        return view('product', compact('pageTitle', 'category', 'product'));
    }

    public function catalog()
    {
        $pageTitle = 'Catálogo de productos';
        $products = Product::orderBy('display_order')->get();
        return view('catalog', compact('pageTitle', 'products'));
    }

    public function priceList()
    {
        $pageTitle = 'Listado de precios';
        
        return view('prices', compact('pageTitle'));
    }

    public function about()
    {
        $pageTitle = 'Quiénes somos';
        return view('about', compact('pageTitle'));
    }

    public function contact()
    {
        $pageTitle = 'Contacto';
        return view('contact', compact('pageTitle'));
    }

    public function admin()
    {
    	return view('admin.welcome');
    }


}
