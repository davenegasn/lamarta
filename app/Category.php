<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function getImageAttribute($value)
    {
    	return asset('storage/' . $value);
    }

    public function products()
    {
    	return $this->belongsToMany(Product::class, 'category_product', 'category_id', 'product_id')->orderBy('display_order', 'ASC');;
    }
}
