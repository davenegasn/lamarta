<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function upsert(Request $request)
    {

        $categories = $request->post('categories');
        
        foreach($categories as $cat){
            if ( $cat['id'] ){
                Category::where('id', $cat['id'])->update($cat);
            }else{
                Category::create($cat);
            }
        }
        return ['success' => true, 'categories' => Category::all()];

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $attributes = $this->validateCategory();

        Category::create($attributes);

        return redirect()->route('categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {

        $attributes = $this->validateCategory();

        $category->update($attributes);

        return redirect()->route('categories');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return ['success' => true];
    }

    /**
     * Display admin page for categories
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {

        $headings = array('ID', 'Nombre', 'Orden', 'Slug');

        $items = Category::orderBy('display_order')->get(['id', 'name', 'display_order', 'slug'])->toArray();

        return view('admin.categories.index', compact('headings', 'items'));
    }

    protected function validateCategory()
    {
        $attributes = request()->validate([
            'name'          => ['string', 'required', 'max:255'],
            'description'   => ['string', 'required', 'max:455'],
            'slug'          => ['string', 'required'],
            'image'         => ['file'],
            'display_order' => ['integer', 'required'],
        ]);

        if(request('image')){
            $attributes['image'] = request('image')->store('products');
        }

        return $attributes;

    }

}
