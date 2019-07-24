@extends('admin.layouts.master')

@section('title')
    Thêm danh mục sản phẩm
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thư mục sản phẩm </h6>
        </div>
        <div class="row" style="margin: 5px">
            <div class="col-lg-12">
                <form role="form" action="{{route('category.store')}}" method="post">
                    @csrf
                    <fieldset class="form-group">
                        <label>Tên</label>
                        <input class="form-control" name="name" placeholder="Nhập tên danh mục">
                        @if($errors->has('name'))
                            <span style="color: red;">
	                    		{{$errors->first('name')}}
	                    	</span>
                        @endif
                    </fieldset>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <select class="form-control" name="status">
                            <option value="1">Hiển Thị</option>
                            <option value="0"> Không Hiển Thị</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Thêm</button>
                    <button type="reset" class="btn btn-primary">Làm mới</button>
                </form>
            </div>
        </div>
    </div>
@endsection