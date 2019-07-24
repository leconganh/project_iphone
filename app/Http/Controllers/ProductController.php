<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ProductType;
use App\Models\Product;


class ProductController extends Controller
{
    protected $productType;
    protected $category;
    protected $product;

    public function __construct(ProductType $productType, Category $category , Product $product)
    {
        $this->productType = $productType;
        $this->category = $category;
        $this->product = $product;
    }

    public function view_show()
    {
        $product = $this->product->showViewProduct();
        $category = $this->category->allCategory();
        $productType = $this->productType->allProductType();

        return response()->json(['product'=>$product,'category'=>$category,'productType'=>$productType],200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = $this->product->allProduct();
        $category = $this->category->allCategory();
        $productType = $this->productType->allProductType();

        return view('admin.pages.product.list',['product'=>$product,'category'=>$category,'productType'=>$productType]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = $this->category->allCategory();
        $productType = $this->productType->allProductType();

        return view('admin.pages.product.add',['category'=>$category,'productType'=>$productType]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->image;
        $images_name = time()."_".$image->getClientOriginalName();
        if ($image->isValid()) {
            $image->move('images/upload/product',$images_name);
            $data = $request->all();
            $data['slug'] = utf8tourl($request->name);
            $data['image'] = $images_name;
            Product::create($data);

            return redirect()->route('product.index')->with('thongbao','Thêm sản phẩm thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

}
