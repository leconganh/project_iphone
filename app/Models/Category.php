<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductType;

class Category extends Model
{
    protected $table = 'category';

    protected $fillable = [
        'name', 'slug', 'status',
    ];

    public function productType()
    {
        return $this->hasMany('App\Models\ProductType', 'id_category', 'id');
    }

    public function showViewCategory()
    {
        $category = Category::paginate(5);

        return $category;
    }

    public function allCategory()
    {
        $category = Category::all();

        return $category;
    }

    public function add($input)
    {
        $input['slug'] = utf8tourl($input['name']);

        return $this->create($input);
    }

    public function showCategory($id)
    {
        return $this->find($id);
    }

    public function editCategory($id, $input)
    {
        $category = $this->showCategory($id);
        $input['slug'] = utf8tourl($input['name']);

        return $category->update($input);
    }

    public function deleteCategory($id)
    {
        $category = $this->showCategory($id);

        if ($category != null) {

            return $category->delete();
        }
    }

}
