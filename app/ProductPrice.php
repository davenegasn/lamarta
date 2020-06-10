<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class ProductPrice extends Model
{
    protected $guarded 		= [];
    protected $table 		= 'product_price';
    public $timestamps 		= false;

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }
    public function unit()
    {
    	return $this->belongsTo(Unit::class);
    }
}
