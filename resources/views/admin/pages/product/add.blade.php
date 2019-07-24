@extends('admin.layouts.master')

@section('title')
    Thêm sản phẩm
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm sản phẩm</h6>
        </div>
        <div class="row" style="margin: 5px">
            <div class="col-lg-12">
                <form role="form" action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="form-group">
                        <label>Tên </label>
                        <input class="form-control" name="name" placeholder="Nhập tên sản phẩm">
                        <!-- @if($errors->has('name'))
                            <span style="color: red;">
	                    		{{$errors->first('name')}}
	                    	</span>
                        @endif -->
                    </fieldset>
                    <div class="form-group">
                        <label>Số Lượng</label>
                        <input class="form-control" type="text" name="quantity" type="number" min="1" value="1" >    
                    </div>
                    <div class="form-group">
                        <label>Đơn giá</label>
                        <input class="form-control" type="text" name="price"  >    
                    </div>
                    <div class="form-group">
                        <label>Giá khuyến mại</label>
                        <input class="form-control" type="text" name="promotional"  value="0"  >    
                    </div>
                    <div class="form-group">
                        <label>Ảnh minh hoạ</label>
                        <input class="form-control" type="file" name="image"    >    
                    </div>
                    <div class="form-group">
                        <label>Mô tả sản phẩm</label>
                        <textarea id="demo" name="description" rows="5" class="form-control ckeditor"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Khuyến mại đặc biệt</label>
                        <textarea id="demo" name="special_promotion" rows="5" class="form-control ckeditor"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Cam kết</label>
                        <textarea id="demo" name="commitment" rows="5" class="form-control ckeditor"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Danh mục sản phẩm </label>
                        <select class="form-control" name="id_category">
                            @foreach($category as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Loại sản phẩm </label>
                        <select class="form-control" name="id_product_type">
                            @foreach($productType as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <select class="form-control" name="status">
                            <option value=1>Hiển Thị</option>
                            <option value=0>Không Hiển Thị</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Thêm</button>
                    <button type="reset" class="btn btn-primary">Làm mới </button>
                </form>
            </div>
        </div>
    </div>
@endsection