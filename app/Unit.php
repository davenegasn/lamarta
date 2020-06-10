<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public function productPrices()
    {
    	return $this->belongsToMany(ProductPrice::class);
    }
}
