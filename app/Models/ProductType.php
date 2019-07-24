<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class ProductType extends Model
{
    protected $table = 'product_type';

    protected $fillable = [
    	'name','slug','status','id_category'
    ];

    public function Category()
    {
    	return $this->belongsTo('App\Models\Category','id_category','id');
    }

    public function showViewProductType()
    {
        $productType = ProductType::paginate(5);
        
        return $productType;
    }

    public function allProductType()
    {
        $productType = ProductType::all();

        return $productType;
    }

    public function addProductType($input)
    {
        $input['slug'] = utf8tourl($input['name']);

        return $this->create($input);
    }

    public function IdProductType($id)
    {
        return $this->find($id);

    }

    public function editProductType($id,$input)
    {
       $productType = $this->IdProductType($id) ;
       $input['slug'] = utf8tourl($input['name']);

       return $productType->update($input);
    }

}
