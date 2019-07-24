<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    protected $fillable = [
    	'name','slug','description','image','quantity','price','promotional','special_promotion','commitment','id_category','id_product_type','status',
    ];

    public function ProductTypes()
    {
    	return $this->belongsTo('App\Models\ProductType','id_product_type','id');
    }
    public function Categories()
    {
    	return $this->belongsTo('App\Models\Category','id_category','id');
    }
}
