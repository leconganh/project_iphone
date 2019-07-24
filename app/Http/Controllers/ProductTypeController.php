<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductType;
use Validator;

class ProductTypeController extends Controller
{
    protected $productType;
    protected $category;

    public function __construct(ProductType $productType, Category $category)
    {
        $this->productType = $productType;
        $this->category = $category;
    }

    public function view_show()
    {
        $productType = $this->productType->showViewProductType();
        $category = $this->category->allCategory();

        return response()->json(['productType' => $productType, 'category' => $category], 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productType = $this->productType->showViewProductType();

        return view('admin.pages.producType.list', ['productType' => $productType]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = $this->category->allCategory();

        return view('admin.pages.producType.add', ['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductType $request)
    {
        $input = $request->all();
        $this->productType->addProductType($input);

        return redirect()->route('productType.index')->with('thongbao', 'Thêm thành công loại sản phẩm.');

    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productType = $this->productType->IdProductType($id);
        $category = $this->category->showViewCategory();

        return response()->json(['productType' => $productType, 'category' => $category], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductType $request, $id)
    {
        $input = $request->all();
        $productType = $this->productType->editProductType($id, $input);

        return response()->json([$productType, 'messages' => 'Sửa thành công'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productType = ProductType::find($id);
        $productType->delete();

        return response()->json(['success' => 'Xoá thành công'], 200);
    }
}
