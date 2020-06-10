<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductsController extends Controller 
{
    public function admin()
    {

        $headings = array('ID', 'Nombre','Orden', 'Categoría(s)');

        $items = Product::with('categories')->get([
            'id', 
            'title', 
            'display_order',
            ]
        )->toArray();
        

        return view('admin.products.index', compact('headings', 'items'));

    }

    public function create()
    {
        //Add last display order on form create 
        $display_order = Product::latest()->pluck('display_order')->first() + 1; 
        
        return view('admin.products.create', compact('display_order'));
    }

    public function store(Request $request)
    {
        
        $attributes     = $this->validateProduct();

        //Categorías del producto
        $categories     = $attributes['categories'];

         //Sacar categorías del arreglo producto
        unset($attributes['categories']);
        
        //get product price variations
        if(isset($attributes['quantity_from']) && isset($attributes['quantity_to'])){

            $quantity_from  = $attributes['quantity_from'];
            $quantity_to    = $attributes['quantity_to'];
            $unit           = $attributes['unit'];
            $prices         = $attributes['prices'];

            unset($attributes['quantity_from']);
            unset($attributes['quantity_to']);
            unset($attributes['unit']);
            unset($attributes['prices']);

        }

        //Crear el producto
        $product = Product::create($attributes);

        //Asignarle las categorías 
        $product->addCategories($categories);

        //add product variation prices
        if(isset($quantity_from) && isset($quantity_to)){
            $product->addPrices($quantity_from, $quantity_to, $prices, $unit);
        }
        
        return redirect()->route('products');
        
    }

    public function edit(Product $product)
    {
        
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {

        $attributes = $this->validateProduct();

        $categories = $attributes['categories'];

        //remove categories array from the request
        unset($attributes['categories']);

        //get product price variations
        if(isset($attributes['quantity_from']) && isset($attributes['quantity_to'])){

            $quantity_from  = $attributes['quantity_from'];
            $quantity_to    = $attributes['quantity_to'];
            $unit           = $attributes['unit'];
            $prices         = $attributes['prices'];

            //remove product price variations from the request
            unset($attributes['quantity_from']);
            unset($attributes['quantity_to']);
            unset($attributes['unit']);
            unset($attributes['prices']);
        }

        //update the product
        $product->update($attributes);

        //add product categories
        $product->addCategories($categories);

        //add product prices
        if(isset($quantity_from) && isset($quantity_to)){
            $product->addPrices($quantity_from, $quantity_to, $prices, $unit, true);
        }
        
        

        return redirect()->route('products');
        
    }

    public function upsert(Request $request)
    {

    	$product = $request->post('products');

    	foreach ( $products as $product ) {

    		if( $product['id'] ){

    			Product::where( 'id', $product['id'] )->update( $product );

    		}else{

    			Product::create($product);

    		}

    		return ['success' => true, 'products' => Product::all()];
    	}
    }

   

    protected function validateProduct()
    {
        $attributes = request()->validate([
            'title'             => ['string', 'required', 'max:255'],
            'unit_price'        => ['numeric', 'required'],
            'description'       => ['string', 'required', 'max:455'],
            'short_description' => ['string', 'required', 'max:455'],
            'image'             => ['file'],
            'display_order'     => ['integer', 'required'],
            'categories'        => ['array', 'required'],
            'image_big'         => ['file'],
            'slug'              => ['string', 'required', 'max:255'],
            'quantity_from'     => ['array', 'nullable'],
            'quantity_to'       => ['array', 'nullable'],
            'unit'              => ['array', 'nullable'],
            'prices'            => ['array', 'nullable'],
           
        ]);

        if(request('image')){
            $attributes['image'] = request('image')->store('products');
        }
         if(request('image_big')){
            $attributes['image_big'] = request('image_big')->store('products');
        }

        return $attributes;
    }
}
